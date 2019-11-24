<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $productBatch = $this->ProductBatches->newEntity();
        if ($this->request->is('post')) {
            $productBatch = $this->ProductBatches->patchEntity($productBatch, $this->request->getData());
            if ($this->ProductBatches->save($productBatch)) {
                $this->Flash->success(__('The product batch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product batch could not be saved. Please, try again.'));
        }
        $products = $this->ProductBatches->Products->find('list', ['limit' => 200]);
        $users = $this->ProductBatches->Users->find('list', ['limit' => 200]);
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

                return $this->redirect(['action' => 'index']);
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