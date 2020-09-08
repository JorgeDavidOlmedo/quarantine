<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * IngresosPais Controller
 *
 * @property \App\Model\Table\IngresosPaisTable $IngresosPais
 */
class IngresosPaisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ingresosPais = $this->paginate($this->IngresosPais);

        $this->set(compact('ingresosPais'));
        $this->set('_serialize', ['ingresosPais']);
    }

    /**
     * View method
     *
     * @param string|null $id Ingresos Pai id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingresosPai = $this->IngresosPais->get($id, [
            'contain' => []
        ]);

        $this->set('ingresosPai', $ingresosPai);
        $this->set('_serialize', ['ingresosPai']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingresosPai = $this->IngresosPais->newEntity();
        if ($this->request->is('post')) {
            $ingresosPai = $this->IngresosPais->patchEntity($ingresosPai, $this->request->data);
            if ($this->IngresosPais->save($ingresosPai)) {
                $this->Flash->success(__('The ingresos pai has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ingresos pai could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ingresosPai'));
        $this->set('_serialize', ['ingresosPai']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingresos Pai id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingresosPai = $this->IngresosPais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingresosPai = $this->IngresosPais->patchEntity($ingresosPai, $this->request->data);
            if ($this->IngresosPais->save($ingresosPai)) {
                $this->Flash->success(__('The ingresos pai has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ingresos pai could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ingresosPai'));
        $this->set('_serialize', ['ingresosPai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingresos Pai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingresosPai = $this->IngresosPais->get($id);
        if ($this->IngresosPais->delete($ingresosPai)) {
            $this->Flash->success(__('The ingresos pai has been deleted.'));
        } else {
            $this->Flash->error(__('The ingresos pai could not be deleted. Please, try again.'));
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
                $ingres = $this->IngresosPais->newEntity($this->request->data);
                $ingres->fecha=date("Y-m-d H:s:i");
                $ingres->usuario = $user;
                if ($this->IngresosPais->save($ingres)) {
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


    public function getIngresos($buscar = null)
    {
        try{
            $ingresos = array();
            $id_empresa = $this->request->session()->read('id_empresa');
            $results=null;
            $connection = ConnectionManager::get('default');
            $user_id = $this->request->session()->read('Auth.User.id');

            if(empty($buscar) || $buscar=="0"){
                $sql = "SELECT *
                FROM ingresos_pais WHERE estado=1 ORDER BY id desc LIMIT 100";

            }else{

                $sql = "SELECT *
                FROM ingresos_pais
                WHERE 
                estado=1 AND
                (nombre like '%".$buscar."%' OR cedula like '%".$buscar."%')
                ORDER BY nombre desc LIMIT 100";

            }
            $results = $connection->execute($sql);

            foreach ($results as $value){
                $ingresos[] = array("id"=>$value['id'],
                    "fecha"=>date('d/m/Y H:i:s',strtotime($value['fecha'])),
                    "nombre"=>$value['nombre'],
                    "cedula"=>$value['cedula'],
                    "usuario"=>$value['usuario']
                );
            }


        }catch (\PDOException $e)
        {

            $message = "error al eliminar.".$e;

        }

        $this->set([
            'ingresos'=>$ingresos,
            '_serialize' => ['ingresos']
        ]);
        $this->viewClass = 'Json';
        $this->render();

    }

    public function buscarDocu($buscar = null)
    {
        try{
            $buscar = trim($buscar);
            $ingresos = array();
            $id_empresa = $this->request->session()->read('id_empresa');
            $results=null;
            $connection = ConnectionManager::get('default');
            $user_id = $this->request->session()->read('Auth.User.id');

            $sql = "SELECT id,
                nombre,
                cedula,
                fecha,
                usuario,
                DATEDIFF(now(),fecha) as dif
                FROM ingresos_pais
                WHERE 
                estado=1 AND
                cedula='".$buscar."'
                ORDER BY id desc LIMIT 1";

            $results = $connection->execute($sql);

            $encontro = 0;
            $color = "verde";
            $mensaje="NO EXISTEN DATOS REGISTRADOS!";
            foreach ($results as $value){
                $encontro = 1;
                if($value['dif']<=15){
                    $color = "rojo";
                    $mensaje="DEBE DE ESTAR EN CUARENTENA!";
                }else{
                    $color = "azul";
                    $mensaje="YA CUMPLIO EL TIEMPO DE CUARENTENA!";
                }
                $ingresos[] = array("id"=>$value['id'],
                    "fecha"=>date('d/m/Y H:i:s',strtotime($value['fecha'])),
                    "nombre"=>$value['nombre'],
                    "cedula"=>$value['cedula'],
                    "usuario"=>$value['usuario'],
                    "cuarentena"=>"15 DÍAS",
                    "ingreso"=>date('d/m/Y',strtotime($value['fecha'])),
                    "hora"=>date('H:i:s',strtotime($value['fecha'])),
                    "dif"=>$value['dif'],
                    "mensaje"=>$mensaje
                );
            }


        }catch (\PDOException $e)
        {

            $message = "error al eliminar.".$e;

        }

        $this->set([
            'ingresos'=>$ingresos,
            'encontro'=>$encontro,
            'mensaje'=>$mensaje,
            'color'=>$color,
            '_serialize' => ['ingresos','encontro','mensaje','color']
        ]);
        $this->viewClass = 'Json';
        $this->render();

    }

}
