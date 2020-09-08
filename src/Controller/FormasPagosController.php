<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormasPagos Controller
 *
 * @property \App\Model\Table\FormasPagosTable $FormasPagos
 */
class FormasPagosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $formasPagos = $this->paginate($this->FormasPagos);

        $this->set(compact('formasPagos'));
        $this->set('_serialize', ['formasPagos']);
    }

    /**
     * View method
     *
     * @param string|null $id Formas Pago id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formasPago = $this->FormasPagos->get($id, [
            'contain' => []
        ]);

        $this->set('formasPago', $formasPago);
        $this->set('_serialize', ['formasPago']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formasPago = $this->FormasPagos->newEntity();
        if ($this->request->is('post')) {
            $formasPago = $this->FormasPagos->patchEntity($formasPago, $this->request->data);
            if ($this->FormasPagos->save($formasPago)) {
                $this->Flash->success(__('The formas pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formas pago could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formasPago'));
        $this->set('_serialize', ['formasPago']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formas Pago id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formasPago = $this->FormasPagos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formasPago = $this->FormasPagos->patchEntity($formasPago, $this->request->data);
            if ($this->FormasPagos->save($formasPago)) {
                $this->Flash->success(__('The formas pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formas pago could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formasPago'));
        $this->set('_serialize', ['formasPago']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formas Pago id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formasPago = $this->FormasPagos->get($id);
        if ($this->FormasPagos->delete($formasPago)) {
            $this->Flash->success(__('The formas pago has been deleted.'));
        } else {
            $this->Flash->error(__('The formas pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
