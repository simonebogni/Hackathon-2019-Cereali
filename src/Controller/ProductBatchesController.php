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
        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
        $loggedUserRoleId = $loggedUser["role_id"];
        $loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
        switch($loggedUserRoleLetter){
            case "S":
                $this->Flash->error(__('You are not authorized to access the requested content.'));
                return $this->redirect(['controller'=>'ProductBatchPartitions', 'action' => 'index']);
                break;
            case "D":
                //mostra i product batches assegnati all'utente
                $productBatches = $this->ProductBatches->find('all', [
                    'contain' => ['Products', 'Assignees', "Assigners"],
                    'conditions' => [
                        'ProductBatches.assignee_id' => $loggedUser["id"]
                    ]
                ]);
                break;
            case "G":
                //mostra i product batches assegnati dall'utente
                $productBatches = $this->ProductBatches->find('all', [
                    'contain' => ['Products', 'Assignees', "Assigners"],
                    'conditions' => [
                        'ProductBatches.assigner_id' => $loggedUser["id"]
                    ]
                ]);
                break;
            default:
                $this->Flash->error(__('You are not authorized to access the requested content.'));
                return $this->redirect(['controller'=>'Users', 'action' => 'index']);
        }
        
        $productBatches = $this->paginate($productBatches);
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
        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
        $loggedUserRoleId = $loggedUser["role_id"];
        $loggedUserDept = substr($loggedUser["role_id"], 1, 1);
        $loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
        if($loggedUserRoleLetter == 'S'){
            $this->Flash->error(__('You are not authorized to access the requested content.'));
            return $this->redirect(['controller'=>'Users', 'action' => 'index']);
        }
        $productBatch = $this->ProductBatches->get($id, [
            'contain' => ['Products', 'Assigners', 'Assignees', 'ProductBatchPartitions']
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
        $loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
        if($loggedUserRoleLetter == 'S' || $loggedUserRoleLetter == 'D'){
            $this->Flash->error(__('You are not authorized to access the requested content.'));
            return $this->redirect(['controller'=>'Users', 'action' => 'index']);
        }
        $productBatch = $this->ProductBatches->newEntity();
        if ($this->request->is('post')) {
            $productBatch = $this->ProductBatches->patchEntity($productBatch, $this->request->getData());
            $productBatch->assigner_id = $loggedUser["id"];
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
        $users = $this->ProductBatches->Assignees->find('all', ['contain'=>['Roles'],'conditions' => ['Assignees.role_id LIKE \'D'.$loggedUserDept.'%\'']]);
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
        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
        $loggedUserRoleId = $loggedUser["role_id"];
        $loggedUserDept = substr($loggedUser["role_id"], 1, 1);
        $loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
        if($loggedUserRoleLetter == 'S'){
            $this->Flash->error(__('You are not authorized to access the requested content.'));
            return $this->redirect(['controller'=>'Users', 'action' => 'index']);
        }
        $productBatch = $this->ProductBatches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productBatch = $this->ProductBatches->patchEntity($productBatch, $this->request->getData());
            if ($this->ProductBatches->save($productBatch)) {
                $this->Flash->success(__('The product batch has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The product batch could not be saved. Please, try again.'));
        }
        $products = $this->ProductBatches->Products->find('list', ['limit' => 200]);
        $users = $this->ProductBatches->Assignees->find('list', ['limit' => 200]);
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
        $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
        $loggedUserRoleId = $loggedUser["role_id"];
        $loggedUserDept = substr($loggedUser["role_id"], 1, 1);
        $loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
        if($loggedUserRoleLetter == 'S' || $loggedUserRoleLetter == 'D'){
            $this->Flash->error(__('You are not authorized to access the requested content.'));
            return $this->redirect(['controller'=>'Users', 'action' => 'index']);
        }
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
