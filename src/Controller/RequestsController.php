<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
{
    /**
     * ContactAccountant method
     * Send a request to an account 'A' (accountant) from an account 'C' (company)
     *
     * @return \Cake\Http\Response|null Redirects to homepage 
     */
    public function contactAccountant($id = null) {
        // pick Auth user company object
        $userSender = $this->Auth->user();
        // create new request entity
        $request = $this->Requests->newEntity();
        // pick receiver's email from id 
        $users = TableRegistry::get('Users');
        $userReceiver = $users->get($id);
        $emailAddr = $userReceiver->email;
        // set the request data
        $request->accountant_id = $userReceiver->id;
        $request->company_id = $userSender['id'];
        $request->request_date = date('Y/m/d H:i:s');
        // try to save the request
        if($this->Requests->save($request)) {
            // show successful message
            $this->Flash->success(__('Your request has been sent. The accountant will receive an email.'));
            // send email to receiver
            $email = new Email('default');
            $email
                ->setViewVars(['company_id'=>$request->company_id, 'accountant_id'=>$id, 'url'=>$this->getUrl()])
                ->template('request')
                ->emailFormat('html')
                ->from(['testone042019@gmail.com' => 'Request'])
                ->to($emailAddr)
                ->subject('Request')
                ->send();
        } else {
            // if the request cannot be saved
            $this->Flash->error(__('The request cannot be sent.'));   
        }
        // redirects to homepage
        return $this->redirect($this->Auth->redirectUrl());
    }

    /**
     * ContactCompany method
     * Send a request to an account 'C' (company) from an account 'A' (accountant)
     *
     * @return \Cake\Http\Response|null Redirects to homepage 
     */
    public function contactCompany($id = null) {
        // pick Auth user accountant object
        $userSender = $this->Auth->user();
        // create new request entity
        $request = $this->Requests->newEntity();
        // pick receiver's email from id
        $users = TableRegistry::get('Users');
        $userReceiver = $users->get($id);
        $emailAddr = $userReceiver->email;
        // set the request data
        $request->accountant_id = $userSender['id'];
        $request->company_id = $userReceiver->id;
        $request->request_date = date('Y/m/d H:i:s');
        // try to save the request
        if($this->Requests->save($request)) {
            // show succesfull message
            $this->Flash->success(__('Your request has been sent. The company will receive an email.'));
            // send email to receiver
            $email = new Email('default');
            $email
                ->setViewVars(['company_id'=>$id, 'accountant_id'=>$request->accountant_id, 'url'=>$this->getUrl()])
                ->template('request')
                ->emailFormat('html')
                ->from(['testone042019@gmail.com' => 'Request'])
                ->to($emailAddr)
                ->subject('Request')
                ->send();
        } else {
            // if the request cannot be saved
            $this->Flash->error(__('The request cannot be sent.'));
        }
        // redirects to homepage
        return $this->redirect($this->Auth->redirectUrl());
    }

    /**
     * Accept method
     * Accept a request already saved in requests table.
     *
     * @return \Cake\Http\Response|null Redirects to homepage 
     */
    public function accept() {
        // pick accountant_id and company_id from GET request
        $accountant_id = $this->request->getQuery('accountant_id');
        $company_id = $this->request->getQuery('company_id');
        // if both are set
        if(isset($accountant_id) && isset($company_id)) {
            // get the request
            $request = $this->Requests->get([$accountant_id, $company_id]);
            // create the contract with the request's data
            $contracts = TableRegistry::get('Contracts');
            $contract = $contracts->newEntity([
                    'accountant_id' => $request->accountant_id,
                    'company_id' => $request->company_id
            ]);
            // try to save it
            if($contracts->save($contract)) {
                $this->Requests->delete($request);
                $this->Flash->success(__("Request accepted."));
            } else {
                $this->Flash->success(__("The request cannot be accepted."));   
            }    
        }
        // redirects to homepage
        return $this->redirect($this->Auth->redirectUrl());
    }
}
