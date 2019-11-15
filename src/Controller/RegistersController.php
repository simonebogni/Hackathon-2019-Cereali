<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Registers Controller
 *
 * @property \App\Model\Table\RegistersTable $Registers
 *
 * @method \App\Model\Entity\Register[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistersController extends AppController
{
    /**
     * Register method
     *
     * @return \Cake\Http\Response|null Redirects to users/login on successful add
     */
    public function register() {
        // if a user is already logged, redirect him to homepage
        if($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        // if there's a POST request
        if ($this->request->is('post')) {
            // create new register entity
            $register = $this->Registers->newEntity();
            // populate the entity with the correct data
            $register = $this->Registers->patchEntity($register, $this->request->getData());
            // check if there's already a registered user with the same email address
            $users = TableRegistry::get('Users');
            // if there's not 
            if($users->find()->where(['email' => $register->email])->isEmpty()) {  
                // save the entity
                if ($this->Registers->save($register)) {
                    $this->Flash->success(__('Your account has been created. Check your mail to complete the registration.'));
                    // send email registration
                    $email = new Email('default');
                    $email
                        ->setViewVars(['email'=>$register->email, 'url'=>$this->getUrl()])
                        ->template('verification')
                        ->emailFormat('html')
                        ->from(['testone042019@gmail.com' => 'Test site name'])
                        ->to($this->request->getData()["email"])
                        ->subject('Registration code')
                        ->send();
                    // return the object
                    return $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
            }
            // otherwise show an error
            $this->Flash->error(__('The registration cannot be completed.'));
        }
    }


    /**
     * Validate method
     *
     * @return \Cake\Http\Response|null Redirects to users/login on successful add
     */
    public function validate() {
        // get the register_id from the GET request
        $email = $this->request->getQuery('email');
        // if the id exists
        if(isset($email)) {
            // pick the relative register row
            $register = $this->Registers->get($email);
            // create a new entity for users
            $users = TableRegistry::get('Users');
            $user = $users->newEntity([
                    'email' => $register->email,
                    'password' => $register->password,
                    'role' => $register->role
            ]);
            // try to save it
            if($users->save($user)) {
                // if it saves succesfully, delete the register row and notify with a flash message
                $this->Registers->delete($register);
                $this->Flash->success(__("Account verified."));
            } else {
                // otherwise, show an error
                $this->Flash->success(__("The verification cannot be completed."));
            }
        }
        // redirect to login
        return $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

    /**
     * beforeFilter method
     *
     * @param \Cake\Event\Event the current event
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        // allow only login and validate if the user is not logged
        $this->Auth->allow(['register']);
        $this->Auth->allow(['validate']);
    }

    /**
     * isAuthorized method
     *
     * @param $user the user object
     * @return true if a user is allowed to acess, otherwise false
     */
    public function isAuthorized($user) {
        // just call the parent method
        return parent::isAuthorized($user);
    }
}
