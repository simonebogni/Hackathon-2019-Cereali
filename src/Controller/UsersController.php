<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     *  Login method
     *  
     *  Check if a verificated user exists. If true, redirect him to homepage
     *
     *  @return \Cake\Http\Response|null Redirect to homepage if the user is already logged or on a succesful login
     */
    public function login() {
        // if a user is already logged, just redirect him to homepage
        if($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        // if there isn't a user already logged, pick post data from form
        if ($this->request->is('post')) {
            // try to identify him
            $user = $this->Auth->identify();
            if ($user) {
                // if data are correct, set him as auth user and redirect to homepage
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            // otherwise, show a flash error
            $this->Flash->error('Your email or password is incorrect.');
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Index method for accountant accounts
     *
     * @return \Cake\Http\Response|void
     */
    public function accountants() {   
        $accountants = $this->Users->find('all', [
            'fields' => ['id','email'],
            'conditions' => ['Users.role = \'A\'']
        ]);

        $accountants = $this->paginate($accountants);
        $this->set(compact('accountants', $accountants));
    }

    /**
     * Index method for general director accounts
     *
     * @return \Cake\Http\Response|void
     */
    public function generalDirectors() {   
        $generalDirectors = $this->Users->find('all', [
            'fields' => ['id','email'],
            'conditions' => ['Users.role = \'G\'']
        ]);

        $generalDirectors = $this->paginate($generalDirectors);
        $this->set(compact('generalDirectors', $generalDirectors));
    }

    /**
     * Index method for employee accounts
     *
     * @return \Cake\Http\Response|void
     */
    public function employees() {   
        $employees = $this->Users->find('all', [
            'fields' => ['id','email'],
            'conditions' => ['Users.role = \'E\'']
        ]);

        $employees = $this->paginate($employees);
        $this->set(compact('employees', $employees));
    }

    /**
     *  Logout method
     *
     *  Logout the current auth user
     *
     *  @return \Cake\Http\Response|null Redirect to login page
     */
    public function logout() {
        // logout the current user and show a flash message
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     *  beforeFilter method [https://book.cakephp.org/3.0/en/controllers.html#controller-callback-methods]
     *
     *  Called before every action in the controller
     */
    public function beforeFilter(Event $event)
    {
        // allow only login
        $this->Auth->allow(['login']);
    
    }

    /**
     *  isAuthorized method [https://book.cakephp.org/3.0/en/controllers/components/authentication.html#authorization]
     *
     *  Authorizes user in the controller. Call the AppController isAuthorized method
     *
     *  @return true if the user is authorized to access the action, otherwise false 
    */
    public function isAuthorized($user) {
        return parent::isAuthorized($user);
    }

}
