<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Bautismos2 Controller
 *
 * @property \App\Model\Table\Bautismos2Table $Bautismos2
 */
class Bautismos2Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $bautismos2 = $this->paginate($this->Bautismos2);

        $this->set(compact('bautismos2'));
        $this->set('_serialize', ['bautismos2']);
    }

    /**
     * View method
     *
     * @param string|null $id Bautismos2 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bautismos2 = $this->Bautismos2->get($id, [
            'contain' => []
        ]);

        $this->set('bautismos2', $bautismos2);
        $this->set('_serialize', ['bautismos2']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bautismos2 = $this->Bautismos2->newEntity();
        if ($this->request->is('post')) {
            $bautismos2 = $this->Bautismos2->patchEntity($bautismos2, $this->request->data);
            if ($this->Bautismos2->save($bautismos2)) {
                $this->Flash->success(__('The bautismos2 has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bautismos2 could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bautismos2'));
        $this->set('_serialize', ['bautismos2']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bautismos2 id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bautismos2 = $this->Bautismos2->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bautismos2 = $this->Bautismos2->patchEntity($bautismos2, $this->request->data);
            if ($this->Bautismos2->save($bautismos2)) {
                $this->Flash->success(__('The bautismos2 has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bautismos2 could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bautismos2'));
        $this->set('_serialize', ['bautismos2']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bautismos2 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bautismos2 = $this->Bautismos2->get($id);
        if ($this->Bautismos2->delete($bautismos2)) {
            $this->Flash->success(__('The bautismos2 has been deleted.'));
        } else {
            $this->Flash->error(__('The bautismos2 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addEntity()
    {
        if ($this->request->is('post')) {

            $conn = ConnectionManager::get('default');
            $conn->begin();
            $user = $this->request->session()->read('Auth.User')['nombre'];
            try{
                $ingres = $this->Bautismos2->newEntity($this->request->data);
                if ($this->Bautismos2->save($ingres)) {
                    $conn->commit();
                    $mensaje = "ok";
                } else {
                    $conn->rollback();
                    $mensaje = "error";
                }

            }catch (\PDOException $e)
            {
                $conn->rollback();
                $mensaje = $e;
                $this->Flash->error(__('Error al guardar. vuelva a intentar.'.$e));
            }
        }

        $this->set([
            'mensaje' => $mensaje,
            'cliente' => $ingres,
            '_serialize' => ['mensaje', 'cliente']
        ]);
        $this->viewClass = 'Json';
        $this->render();

    }
}
