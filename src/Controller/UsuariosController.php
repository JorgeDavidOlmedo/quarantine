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
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{

        public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        $this->Auth->allow(['login']);
    }


    public function datos()
    {
        $usuario = $this->Usuarios->get($this->Auth->user('id'));

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

        public  function isAuthorized($user=null)

    {
        if(isset($user['rol']) && $user['rol']==='user')
        {
            if(in_array($this->request->action,['home']))
            {
                return true;
            }
        }
        return parent::isAuthorized();
    }


    public function login()
    {

        if($this->request->is('post'))
        {

          $user  = $this->Auth->identify();

           if($user){

             $this->Auth->setUser($user);
             return $this->redirect($this->Auth->redirectUrl());

           }else{
             $this->Flash->error('Datos incorrectos',['key'=>'auth']);
           }
        }


        if($this->request->session()->read('Auth.User'))
        {
             return $this->redirect($this->Auth->redirectUrl());

        }

    }


    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       $id_empresa = $this->request->session()->read('id_empresa');
       $this->paginate = [
           'conditions'=>array('and'=>array('Usuarios.estado'=>1)),
            'order'=>['Usuarios.id DESC'],
            'limit'=>25];

        $usuarios = $this->paginate($this->Usuarios);
        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $usuario = $this->Usuarios->newEntity();

        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            $usuario->es_admin = $usuario->perfil;
            $usuario->rol_id = $usuario->rol;
            $usuario->ultimo_login = date("Y-m-d H:s:i");
            $usuario->ultimo_logout = date("Y-m-d H:s:i");
            $ip = $this->request->clientIp();
            $usuario->ip_address = $ip;
            $usuario->id_empresa = $usuario->empresa;
            unset($usuario->perfil,$usuario->rol,$usuario->empresa);

            $connection = ConnectionManager::get('default');
            $id_empresa = $this->request->session()->read('id_empresa');

            $sql_verificar_email_duplicado = "SELECT * FROM usuarios WHERE email='".$usuario->email."' ";
            //echo $sql_verificar_email_duplicado;die();
            $resultado = $connection->execute($sql_verificar_email_duplicado);
            $encontro = 0;
            foreach ($resultado as $value){
                $encontro = 1;
            }

            if($encontro==1){
                $this->Flash->error(__('No se puede guardar. ya existe un email igual.'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El Usuario se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se puedo guardar el registro.'));
            }

        }
        $this->loadModel("Roles");
        $roles = $this->Roles->find('list',['keyField' => 'id','valueField' => 'descripcion']);

        $this->loadModel("Empresas");
        $empresas = $this->Empresas->find('list',['keyField' => 'id','valueField' => 'agente_nombre_empresa']);

        $this->set(compact('usuario','roles','empresas'));
        $this->set('_serialize', ['usuario']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            $usuario->es_admin = $usuario->perfil;
            $usuario->rol_id = $usuario->rol;
            $usuario->ultimo_login = date("Y-m-d H:s:i");
            $usuario->ultimo_logout = date("Y-m-d H:s:i");
            $ip = $this->request->clientIp();
            $usuario->ip_address = $ip;
            $usuario->id_empresa = $usuario->empresa;
            unset($usuario->perfil,$usuario->rol,$usuario->empresa);

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El Usuario se edito correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo editar el registro.'));
            }
        }
        $this->loadModel("Roles");
        $roles = $this->Roles->find('list',['keyField' => 'id','valueField' => 'descripcion']);

        $this->loadModel("Empresas");
        $empresas = $this->Empresas->find('list',['keyField' => 'id','valueField' => 'agente_nombre_empresa']);


        $this->set(compact('usuario','roles','empresas'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('El Usuario se borro correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo borrar el registro'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function setIdEmpresa($id_empresa = null,$empresa = null)
    {
        $this->request->session()->write('id_empresa', $id_empresa);
        //$empresa = substr($empresa, 0, 45);
        $this->request->session()->write('empresa', $empresa);
        $this->Flash->success(__('Empresa actual: '.$empresa));

        return $this->redirect( Router::url( $this->referer(), true ) );
        //return $this->redirect(array("controller" => "pages",
        //  "action" => "index"));

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function getEmpresasForUsers($usuario = null)
    {

        $results=null;
        $connection = ConnectionManager::get('default');
        $id_empresa = $this->request->session()->read('id_empresa');


        $sql="SELECT 
              b.id as id,
              b.monto_cuota as monto,
              b.descripcion as descripcion,
              b.telefono as telefono,
              b.direccion as direccion,
              b.ruc as ruc,
              b.representante as representante   
              FROM usuarios_empresas a, empresas b 
              WHERE 
              a.id_empresa=b.id AND 
              a.estado=1 AND 
              a.id_usuario = ".$usuario."
              ";

        $results = $connection->execute($sql);

        $resultado_valor = array();
        foreach ($results as $value){
            $this->request->session()->write("monto_cuota",$value['monto']);
            $resultado_valor[] = array("id"=>$value['id'],
                "id_empresa"=>$value['id'],
                "descripcion"=> trim($value['descripcion']),
                "telefono"=> $value['telefono'],
                "direccion"=> $value['direccion'],
                "representante"=> $value['representante'],
                "monto"=> $value['monto'],
                "ruc"=> $value['ruc'],
                "estado"=>1 );
        }

        $valores = $resultado_valor;
        $this->set([
            'valores' => $valores,
            '_serialize' => ['valores']
        ]);
        $this->viewClass = 'Json';
        $this->render();

    }



}
