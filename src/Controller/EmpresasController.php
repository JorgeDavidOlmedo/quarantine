<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Thread;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 */
class EmpresasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->paginate = [
            'conditions'=>[],
            'order'=>['Empresas.id DESC'],
            'limit'=>25];

        $empresas = $this->paginate($this->Empresas);

        $this->set(compact('empresas'));
        $this->set('_serialize', ['empresas']);
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);

        $this->set('empresa', $empresa);
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->data);
            $empresa->agente_documento_id = $empresa->agente_documento_2;
            $empresa->agente_pais = $empresa->pais;
            unset($empresa->agente_documento_2,$empresa->pais);
            if ($this->Empresas->save($empresa)) {

                $target_path = WWW_ROOT . 'images/';
                $file_name = $_FILES['ufile']['name'];
                //debug($file_name);die();
                $parts = explode(".", $file_name);
                $fname = $parts[0];
                $new_file_name = $empresa->id. "_".$empresa->agente_nombre . "." . "jpg";
                //$path = $new_file_name;
                $to_path = $target_path . $empresa->id ."_". $empresa->agente_nombre . "." . "jpg"; //set the target path with a new name of image
                //echo $path;
                $results = null;
                $connection = ConnectionManager::get('default');
                $sql = "UPDATE empresas SET agente_foto='".$new_file_name."' WHERE id=".$empresa->id;
                $connection->execute($sql);
                if ($file_name != '') {
                    if (move_uploaded_file($_FILES['ufile']['tmp_name'], $to_path)) {
                        echo "Successful";
                    }
                }

                $this->Flash->success(__('La empresa se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error.'));
            }
        }

        $this->loadModel("Countries");
        $paises = $this->Countries->find('list',['keyField' => 'id','valueField' => 'name']);


        $this->set(compact('empresa','paises'));
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->data);
            $empresa->agente_documento_id = $empresa->agente_documento_2;
            $empresa->agente_pais = $empresa->pais;
            if ($this->Empresas->save($empresa)) {

                $target_path = WWW_ROOT . 'images/';
                $file_name = $_FILES['ufile']['name'];
                if(!empty($file_name)){
                    //debug($file_name);die();
                    $parts = explode(".", $file_name);
                    $fname = $parts[0];
                    $new_file_name = $empresa->id. "_".$empresa->agente_nombre . "." . "jpg";
                    //$path = $new_file_name;
                    $to_path = $target_path . $empresa->id ."_". $empresa->agente_nombre . "." . "jpg"; //set the target path with a new name of image
                    //echo $path;
                    $results = null;
                    $connection = ConnectionManager::get('default');
                    $sql = "UPDATE empresas SET agente_foto='".$new_file_name."' WHERE id=".$empresa->id;
                    $connection->execute($sql);
                    if ($file_name != '') {
                        if (move_uploaded_file($_FILES['ufile']['tmp_name'], $to_path)) {
                            echo "Successful";
                        }
                    }
                }


                $this->Flash->success(__('La empresa se modifico correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error.'));
            }
        }

        $this->loadModel("Countries");
        $paises = $this->Countries->find('list',['keyField' => 'id','valueField' => 'name']);


        $this->set(compact('empresa','paises'));
        $this->set('_serialize', ['empresa']);
    }

    public function delete($id = null)
    {
        $conn = ConnectionManager::get('default');

            $sql_borrar = "DELETE FROM empresas WHERE id=".$id;
            $resultado_borrado = $conn->execute($sql_borrar);

            if($resultado_borrado){
                $this->Flash->success(__('Se borro corretamente.'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Error al borrar.'));
                return $this->redirect(['action' => 'index']);
            }

    }
}
