<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * ProductBatches Controller
 *
 * @property \App\Model\Table\ProductBatchesTable $ProductBatches
 *
 * @method \App\Model\Entity\ProductBatch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductBatchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Users']
        ];
        $productBatches = $this->paginate($this->ProductBatches);

        $this->set(compact('productBatches'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Batch id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productBatch = $this->ProductBatches->get($id, [
            'contain' => ['Products', 'Users', 'ProductBatchPartitions']
        ]);

        $this->set('productBatch', $productBatch);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
        $loggedUserRoleId = $loggedUser["role_id"];
        $loggedUserDept = substr($loggedUser["role_id"], 1, 1);
        $productBatch = $this->ProductBatches->newEntity();
        if ($this->request->is('post')) {
            $productBatch = $this->ProductBatches->patchEntity($productBatch, $this->request->getData());
            $productBatch->creation_date = Time::now();
            $productBatch->closed_date = null;
            $productBatch->quantity_sale_effective = null;
            $productBatch->quantity_online_sale_effective = null;
            $productBatch->average_unit_price = null;
            if ($this->ProductBatches->save($productBatch)) {
                $this->Flash->success(__('The product batch has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->log($productBatch->getErrors(),'error');
            $this->Flash->error(__('The product batch could not be saved. Please, try again.'));
        }
        $products = $this->ProductBatches->Products->find('all', [
            'contain' => ['ProductAreas'], 
            'order'=>['ProductAreas.id' => 'ASC', 'Products.name'=>'ASC']
            ]);
        $users = $this->ProductBatches->Users->find('all', ['contain'=>['Roles'],'conditions' => ['Users.role_id LIKE \'D'.$loggedUserDept.'%\'']]);
        $this->set(compact('productBatch', 'products', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Batch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productBatch = $this->ProductBatches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productBatch = $this->ProductBatches->patchEntity($productBatch, $this->request->getData());
            if ($this->ProductBatches->save($productBatch)) {
                $this->Flash->success(__('The product batch has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The product batch could not be saved. Please, try again.'));
        }
        $products = $this->ProductBatches->Products->find('list', ['limit' => 200]);
        $users = $this->ProductBatches->Users->find('list', ['limit' => 200]);
        $this->set(compact('productBatch', 'products', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Batch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBatch = $this->ProductBatches->get($id);
        if ($this->ProductBatches->delete($productBatch)) {
            $this->Flash->success(__('The product batch has been deleted.'));
        } else {
            $this->Flash->error(__('The product batch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
