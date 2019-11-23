<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductAreas Controller
 *
 * @property \App\Model\Table\ProductAreasTable $ProductAreas
 *
 * @method \App\Model\Entity\ProductArea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductAreasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $productAreas = $this->paginate($this->ProductAreas);

        $this->set(compact('productAreas'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Area id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productArea = $this->ProductAreas->get($id, [
            'contain' => ['Products', 'Roles']
        ]);

        $this->set('productArea', $productArea);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productArea = $this->ProductAreas->newEntity();
        if ($this->request->is('post')) {
            $productArea = $this->ProductAreas->patchEntity($productArea, $this->request->getData());
            if ($this->ProductAreas->save($productArea)) {
                $this->Flash->success(__('The product area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product area could not be saved. Please, try again.'));
        }
        $this->set(compact('productArea'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Area id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productArea = $this->ProductAreas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productArea = $this->ProductAreas->patchEntity($productArea, $this->request->getData());
            if ($this->ProductAreas->save($productArea)) {
                $this->Flash->success(__('The product area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product area could not be saved. Please, try again.'));
        }
        $this->set(compact('productArea'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Area id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productArea = $this->ProductAreas->get($id);
        if ($this->ProductAreas->delete($productArea)) {
            $this->Flash->success(__('The product area has been deleted.'));
        } else {
            $this->Flash->error(__('The product area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
