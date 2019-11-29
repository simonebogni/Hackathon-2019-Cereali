<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => ['ProductBatches', 'Users']
        ]);

        $this->set('productBatchPartition', $productBatchPartition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");

        $productBatchPartition = $this->ProductBatchPartitions->newEntity();
        if ($this->request->is('post')) {
            $productBatchPartition = $this->ProductBatchPartitions->patchEntity($productBatchPartition, $this->request->getData());
            $productBatchPartition->assigner_id = $loggedUser["id"];
            if ($this->ProductBatchPartitions->save($productBatchPartition)) {
                $this->Flash->success(__('The product batch partition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product batch partition could not be saved. Please, try again.'));
        }
        $productBatches = $this->ProductBatchPartitions->ProductBatches->find('list', ['limit' => 200]);
        $users = $this->ProductBatchPartitions->Users->find('list', ['limit' => 200]);
        $this->set(compact('productBatchPartition', 'productBatches', 'users'));
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

                return $this->redirect(['action' => 'index']);
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
