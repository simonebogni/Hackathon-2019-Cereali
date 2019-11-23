<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Headquarters Controller
 *
 * @property \App\Model\Table\HeadquartersTable $Headquarters
 *
 * @method \App\Model\Entity\Headquarters[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HeadquartersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $headquarters = $this->paginate($this->Headquarters);

        $this->set(compact('headquarters'));
    }

    /**
     * View method
     *
     * @param string|null $id Headquarters id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $headquarters = $this->Headquarters->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('headquarters', $headquarters);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $headquarters = $this->Headquarters->newEntity();
        if ($this->request->is('post')) {
            $headquarters = $this->Headquarters->patchEntity($headquarters, $this->request->getData());
            if ($this->Headquarters->save($headquarters)) {
                $this->Flash->success(__('The headquarters has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The headquarters could not be saved. Please, try again.'));
        }
        $users = $this->Headquarters->Users->find('list', ['limit' => 200]);
        $this->set(compact('headquarters', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Headquarters id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $headquarters = $this->Headquarters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $headquarters = $this->Headquarters->patchEntity($headquarters, $this->request->getData());
            if ($this->Headquarters->save($headquarters)) {
                $this->Flash->success(__('The headquarters has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The headquarters could not be saved. Please, try again.'));
        }
        $users = $this->Headquarters->Users->find('list', ['limit' => 200]);
        $this->set(compact('headquarters', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Headquarters id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $headquarters = $this->Headquarters->get($id);
        if ($this->Headquarters->delete($headquarters)) {
            $this->Flash->success(__('The headquarters has been deleted.'));
        } else {
            $this->Flash->error(__('The headquarters could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
