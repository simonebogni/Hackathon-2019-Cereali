<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * ProductBatchPartitions Controller
 *
 * @property \App\Model\Table\ProductBatchPartitionsTable $ProductBatchPartitions
 *
 * @method \App\Model\Entity\ProductBatchPartition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductBatchPartitionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductBatches', 'Users']
        ];
        $productBatchPartitions = $this->paginate($this->ProductBatchPartitions);

        $this->set(compact('productBatchPartitions'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Batch Partition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productBatchPartition = $this->ProductBatchPartitions->get($id, [
            'contain' => ['ProductBatches', 'Assigners', 'Assignees']
        ]);

        $this->set('productBatchPartition', $productBatchPartition);
    }

    /**
     * Add method
     * @param string|null $batchId Product Batch id.
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($batchId = null)
    {

        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
        $loggedUserRoleId = $loggedUser["role_id"];
        $loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
        $loggedUserProductArea = substr($loggedUserRoleId, 2, 1);

        $productBatchPartition = $this->ProductBatchPartitions->newEntity();
        if ($this->request->is('post')) {
            $productBatchPartition = $this->ProductBatchPartitions->patchEntity($productBatchPartition, $this->request->getData());
            $productBatchPartition->assigner_id = $loggedUser["id"];
            $productBatchPartition->quantity_sale_effective = null;
            $productBatchPartition->effective_sale_price = null;
            $productBatchPartition->extraordinary_loss_value = 0.00;
            $productBatchPartition->extraordinary_loss_type = null;
            $productBatchPartition->creation_date = Time::now();
            $productBatchPartition->product_batch_id = $batchId;
            $productBatchPartition->assigner_id = $loggedUser["id"];
            if ($this->ProductBatchPartitions->save($productBatchPartition)) {
                $this->Flash->success(__('The product batch partition has been saved.'));

                return $this->redirect(['controller'=>'ProductBatches', 'action' => 'view', $batchId]);
            }
            $this->Flash->error(__('The product batch partition could not be saved. Please, try again.'));
        }
        if($batchId != null){
            $ProductBatches = TableRegistry::getTableLocator()->get('ProductBatches');

            $productBatch = $ProductBatches->get($batchId, ['contain' => ['Assignees']]);
            if($productBatch->assignee_id != $loggedUser["id"]){
                $this->Flash->error(__('You can\'t create partitions if you the batch has not been assigned to you.'));
                return $this->redirect(['controller'=>'Users', 'action' => 'index']);
            }
            //get sellers of the same product area
            $users = $this->ProductBatchPartitions->Users->find('all', [
                'conditions' => [
                    'Users.role_id LIKE \'S_'.$loggedUserProductArea.'\''
                ]
            ]);
            //get max quantity available
            $quantitySaleGoals = $this->ProductBatchPartitions->find('all', [
                'contain' => ['ProductBatches'],
                'conditions' => [
                    'ProductBatches.id' => $productBatch->id
                ],
                'fields'=>[
                    'quantity_sale_goal'
                ]
            ]);
            $quantityTaken = 0;
            foreach($quantitySaleGoals as $quantitySaleGoal){
                $quantityTaken += $quantitySaleGoal->quantity_sale_goal;
            }
            $maxQuantity = $productBatch->quantity_sale_goal - $quantityTaken;
            $this->set(compact('productBatchPartition', 'productBatch', 'users', 'maxQuantity'));
        } else {
            $this->Flash->error(__('The batch id was not passed as a parameter.'));
            return $this->redirect(['controller'=>'Users', 'action' => 'add']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Batch Partition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productBatchPartition = $this->ProductBatchPartitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productBatchPartition = $this->ProductBatchPartitions->patchEntity($productBatchPartition, $this->request->getData());
            if ($this->ProductBatchPartitions->save($productBatchPartition)) {
                $this->Flash->success(__('The product batch partition has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The product batch partition could not be saved. Please, try again.'));
        }
        $productBatches = $this->ProductBatchPartitions->ProductBatches->find('list', ['limit' => 200]);
        $users = $this->ProductBatchPartitions->Users->find('list', ['limit' => 200]);
        $this->set(compact('productBatchPartition', 'productBatches', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Batch Partition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBatchPartition = $this->ProductBatchPartitions->get($id);
        if ($this->ProductBatchPartitions->delete($productBatchPartition)) {
            $this->Flash->success(__('The product batch partition has been deleted.'));
        } else {
            $this->Flash->error(__('The product batch partition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
