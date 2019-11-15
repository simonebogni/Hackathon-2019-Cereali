<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hours Controller
 *
 * @property \App\Model\Table\HoursTable $Hours
 *
 * @method \App\Model\Entity\Hour[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HoursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Headquarters']
        ];
        $hours = $this->paginate($this->Hours);
        $this->set(compact('hours'));
    }
    
    /**
     * Check method
     *
     * @return \Cake\Http\Response|void Redirect to index
     */
    public function check() {
        // pick user id from Auth
        $user = $this->Auth->user();
        // pick headquarter_id and type from the GET call
        $headquarter_id = $this->request->getQuery('headquarter_id');
        $type = $this->request->getQuery('type');
        // if IN type check
        if($type === 'IN') {
            // create a new hour entity
            $hour = $this->Hours->newEntity([
                'user_id' => $user['id'],
                'headquarter_id' => $headquarter_id,
                'go_in' => date('Y/m/d H:i:s')
            ]);
            // and try to save it
            if($this->Hours->save($hour)) {
                $this->Flash->success(__("Check in validated."));
            } else {
                $this->Flash->success(__("A problem occured."));
            }
        } else  if($type === 'OUT') {
        // if OUT type check
            // pick the already created row in the db
            $hour = $this->Hours->find('all')
                ->where([
                    'user_id =' => $user['id'],
                    'DATE(go_in) =' => date('Y/m/d') 
                ])
                ->first();
            // set the current time as check go_out hour
            $hour->go_out = date('Y/m/d H:i:s');
            // try to save the updated row
            if($this->Hours->save($hour)) {
                $this->Flash->success(__("Check out validated."));
            } else {
                $this->Flash->success(__("A problem occured."));
            }
        }
        // in every case, redirect to homepage
        return $this->redirect($this->Auth->redirectUrl());
    }

    /**
     * isAuthorized method
     *
     * @param $user the user object
     * @return true if a user is allowed to acess, otherwise false
     */
    public function isAuthorized($user) {
        // employeer can access to hours actions
        
        if ($user['role'] === 'E') {
            return true;
        }

        // Default deny
        return true;
    }
}
