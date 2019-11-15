<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadModel('Configurations');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer(),
            'authorize' => 'Controller',
            ]
        );
        //$this->loadComponent('Security');

        // export user
        $this->set('user', $this->Auth->user());

    }

    /**
     * Return the URL config value
     *
     * @return the main site's url
    */
    public function getURL() {
        // get URL from configurations table
        $url = $this->Configurations->find('all', [
            'fields' => 'item_value',
            'conditions' => ['Configurations.item_key = \'URL\'']
        ])->first()->item_value;
        return "http://" . $url; // temp http prefix
    }

    /**
     * isAuthorized method
     *
     * @param $user the user object
     * @return true if a user is allowed to acess, otherwise false
     */
    public function isAuthorized($user) {
        // if the user is logged, allow to access
        if(isset($user))
            return true;
        // by default deny access.
        return false;
    }

}
