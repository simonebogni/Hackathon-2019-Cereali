<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShockTypes Controller
 *
 * @property \App\Model\Table\ShockTypesTable $ShockTypes
 *
 * @method \App\Model\Entity\ShockType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShockTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $shockTypes = $this->paginate($this->ShockTypes);

        $this->set(compact('shockTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Shock Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shockType = $this->ShockTypes->get($id, [
            'contain' => ['ShockReports']
        ]);

        $this->set('shockType', $shockType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shockType = $this->ShockTypes->newEntity();
        if ($this->request->is('post')) {
            $shockType = $this->ShockTypes->patchEntity($shockType, $this->request->getData());
            if ($this->ShockTypes->save($shockType)) {
                $this->Flash->success(__('The shock type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shock type could not be saved. Please, try again.'));
        }
        $this->set(compact('shockType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shock Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shockType = $this->ShockTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shockType = $this->ShockTypes->patchEntity($shockType, $this->request->getData());
            if ($this->ShockTypes->save($shockType)) {
                $this->Flash->success(__('The shock type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shock type could not be saved. Please, try again.'));
        }
        $this->set(compact('shockType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shock Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shockType = $this->ShockTypes->get($id);
        if ($this->ShockTypes->delete($shockType)) {
            $this->Flash->success(__('The shock type has been deleted.'));
        } else {
            $this->Flash->error(__('The shock type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
