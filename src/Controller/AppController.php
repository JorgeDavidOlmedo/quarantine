<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Auth\DefaultPasswordHasher;



/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
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

         $this->loadComponent('RequestHandler');
         $this->loadComponent('Flash');

            if($this->request->is('json')){
                 $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                    'Basic' => [
                    'userModel' => 'Usuarios',
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'scope' => ['Usuarios.estado' => 1]
                ]
            ],
            'authError' => 'Por favor complete los campos.',
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'home'
            ],
            'logoutRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'loginAction' => [

                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'storage' => 'Session'
        ]);
          
          }else{
                $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                    'Form' => [
                    'userModel' => 'Usuarios',
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'scope' => ['Usuarios.estado' => 1]
                ]


            ],
            'authError' => 'Por favor complete los campos.',
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'home'
            ],
            'logoutRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'loginAction' => [

                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'storage' => 'Session'
        ]);
            }
       

    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

     public function beforeFilter(Event $event)
    {

        if($this->Auth->user()!=null){
            $this->set('current_user',$this->Auth->user());
            $length = 12;
            $today = date("Y-m-d H:s:i");
            $out = substr(hash('md5', $today), 0, $length);
            $_SESSION['version'] = $out;
            $this->loadModel('UsuariosEmpresas');
            $empresas_for_usuario = $this->UsuariosEmpresas->find('all',array('contain'=>'Empresas'))->order(['UsuariosEmpresas.id DESC']);
            $empresas_for_usuario_admin = $this->UsuariosEmpresas->find('all',
                array(
                    'group' => array('UsuariosEmpresas.id_empresa'),
                    'contain'=>array('Empresas')))->order(['UsuariosEmpresas.id DESC']);

            $this->verificar_business_for_user();

            $this->set(compact('empresas_for_usuario','empresas_for_usuario_admin'));

        }
    }


    public function verificar_business_for_user(){

        $month = date('m');
        $year = date('Y');
        $fecha_inicio = date('Y-m-d', mktime(0,0,0, $month, 1, $year));

        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0,0,0, $month+1, 0, $year));

        $fecha_final = date('Y-m-d', mktime(0,0,0, $month, $day, $year));

        $this->loadModel('UsuariosEmpresas');
        $empresas_for_usuario = $this->UsuariosEmpresas->find('all',array('contain'=>'Empresas'))->order(['UsuariosEmpresas.id DESC']);

        $id_empresa = $this->request->session()->read('id_empresa');
        $empresa = $this->request->session()->read('empresa');
        $this->request->session()->write("aplicacion","Empresa: ".$this->request->session()->read('empresa')." / "."PDV");
        $inicial = $this->request->session()->read("fecha_ini");
        $final = $this->request->session()->read("fecha_fin");

        foreach ($empresas_for_usuario as $value){
            if($id_empresa == '' || $id_empresa == null || $empresa == '' || $empresa == null){
                if($value->id_usuario==$this->request->session()->read('Auth.User.id')){

                    $this->request->session()->write('id_empresa', $value->empresa->id);
                    $empresa = ($value->empresa->fantasia);
                    $this->request->session()->write('empresa',$empresa);
                    $this->request->session()->write('fecha_ini',$fecha_inicio);
                    $this->request->session()->write('fecha_fin',$fecha_final);
                }
            }
        }
        $this->request->session()->write("aplicacion","Empresa: ".$this->request->session()->read('empresa')." / "."PDV");

    }

    
    public function isAuthorized($user=null)
    {

        if (empty($this->request->params['prefix'])) {
            return true;
        }

        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($user['rol'] === 'admin');
        }

        return false;
    }

}
