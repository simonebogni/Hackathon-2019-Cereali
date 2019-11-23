<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShockReports Controller
 *
 * @property \App\Model\Table\ShockReportsTable $ShockReports
 *
 * @method \App\Model\Entity\ShockReport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShockReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ShockTypes', 'Users']
        ];
        $shockReports = $this->paginate($this->ShockReports);

        $this->set(compact('shockReports'));
    }

    /**
     * View method
     *
     * @param string|null $id Shock Report id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shockReport = $this->ShockReports->get($id, [
            'contain' => ['ShockTypes', 'Users']
        ]);

        $this->set('shockReport', $shockReport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shockReport = $this->ShockReports->newEntity();
        if ($this->request->is('post')) {
            $shockReport = $this->ShockReports->patchEntity($shockReport, $this->request->getData());
            if ($this->ShockReports->save($shockReport)) {
                $this->Flash->success(__('The shock report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shock report could not be saved. Please, try again.'));
        }
        $shockTypes = $this->ShockReports->ShockTypes->find('list', ['limit' => 200]);
        $users = $this->ShockReports->Users->find('list', ['limit' => 200]);
        $this->set(compact('shockReport', 'shockTypes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shock Report id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shockReport = $this->ShockReports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shockReport = $this->ShockReports->patchEntity($shockReport, $this->request->getData());
            if ($this->ShockReports->save($shockReport)) {
                $this->Flash->success(__('The shock report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shock report could not be saved. Please, try again.'));
        }
        $shockTypes = $this->ShockReports->ShockTypes->find('list', ['limit' => 200]);
        $users = $this->ShockReports->Users->find('list', ['limit' => 200]);
        $this->set(compact('shockReport', 'shockTypes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shock Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shockReport = $this->ShockReports->get($id);
        if ($this->ShockReports->delete($shockReport)) {
            $this->Flash->success(__('The shock report has been deleted.'));
        } else {
            $this->Flash->error(__('The shock report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
