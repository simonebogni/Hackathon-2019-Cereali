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

    /**
     * Index method for user accounts
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {  
        $users = $this->Users->find('all', [
            'fields' => ['id','email', 'city'],
            'conditions' => ['Users.role_id LIKE \'S%\'']
        ]);

        $users = $this->paginate($users);
        $this->set(compact('users', $users));
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
            'contain' => ['Roles', 'Headquarters', 'Hours', 'ShockReports']
        ]);

        $this->set('user', $user);
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
        if(substr($loggedUserRoleId, 0, 1) == "S"){
            $this->Flash->error(__('You are not authorized to access the requested content.'));
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('all');
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
