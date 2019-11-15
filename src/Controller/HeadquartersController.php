<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

use Endroid\QrCode\QrCode;

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
        $user = $this->Auth->user();
        $id = $user['id'];

        $headquarters = $this->Headquarters->find('all', [
            'fields' => ['id', 'max_hours', 'user_id', 'is_legal'],
            'conditions' => ['Headquarters.user_id = \'' . $id . '\'']
        ]);
        $headquarters = $this->paginate($headquarters);
        $this->set(compact('headquarters'), $headquarters);
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
        $headquarter = $this->Headquarters->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('headquarter', $headquarter);
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
            $headquarters->user_id = $this->Auth->user('id');
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

    /**
     * GenerateQRCode method
     *
     * @return \Cake\Http\Response|null Just force the download of the QR code
     */
    public function generateQRCode() {
        // pick headquarter_id and type from the GET call
        $id = $this->request->getQuery('id');
        $type = $this->request->getQuery('type');
        // create the URL contained in the QR code
        $url = $this->getUrl() . Router::url([
            'controller' => 'hours',
            'action' => 'check',
            '?' => [
                'headquarter_id' => $id,
                'type' => $type
            ]    
        ]);
        // generate the QR code
        $qrCode = new QrCode($url);
        // create the file
        header('Content-Type: '.$qrCode->getContentType());
        $qrCode->writeFile(WWW_ROOT . '/qrcode-' . $type .'.png');
        $file_path = WWW_ROOT.'/qrcode-'. $type . '.png';
        // download it
        $this->response->file($file_path, array(
            'download' => true,
            'name' => 'qrcode-'. $type . '.png',
        ));
        // remove it from the server
        unlink($file_path);
        return $this->response;
    }

    /**
     * isAuthorized method
     *
     * @param $user the user object
     * @return true if a user is allowed to acess, otherwise false
     */
    public function isAuthorized($user)
    {
        // company can access to headquarter actions
        if ($user['role'] === 'C' || $user['role'] === 'A') {
            return true;
        }
        // by default deny
        return true;
    }
}
