<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * CuentasCajas Controller
 *
 * @property \App\Model\Table\CuentasCajasTable $CuentasCajas
 */
class Correo extends AppController
{

    public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        $this->Auth->allow(['printArqueo2']);
    }


    public function __construct() {
        require_once(ROOT . DS . 'webroot' . DS . "class/tcpdf" . DS . "tcpdf.php");
        require_once(ROOT . DS . 'webroot' . DS . "class" . DS . "PHPJasperXML.inc.php");
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function printArqueo2($id=null, $fecha = null,$id_cajero = null)
    {

        //require_once(ROOT . DS . 'webroot' . DS . "class" . DS . "setting.php");

        try{

            $desde = $fecha;
            $id_moneda = 5;

            if($id_moneda==5){
                $moneda_descrip = "Guaranies";
            }

            if($id_moneda==1){
                $moneda_descrip = "Dolares";
            }

            if($id_moneda==2){
                $moneda_descrip = "Real";
            }

            if($id_moneda==3){
                $moneda_descrip = "Peso";
            }

            if($id_moneda==4){
                $moneda_descrip = "Euro";
            }

            $hasta = $fecha;

            $hoy = date("Y-m-d");
            $hoy = explode("-",$hoy);
            $hoy = $hoy[2].'/'.$hoy[1].'/'.$hoy[0];

            $desde = explode("-",$desde);
            $desde = $desde[2].'/'.$desde[1].'/'.$desde[0];
            $hora = date("H:i:s");
            $empresa_descripcion = "";
            $empresa_direccion = "";
            $empresa_ruc = "";
            $empresa_contacto = "";
            $this->loadModel("Empresas");
            $empresa= $this->Empresas->find("all")->where(['id'=>3,'estado'=>1]);

            $results=null;
            $connection = ConnectionManager::get('default');


            foreach ($empresa as $value){
                $empresa_descripcion = $value->descripcion;
                $empresa_direccion = $value->direccion;
                $empresa_ruc = $value->ruc;
                $empresa_contacto = $value->telefono;
            }

            /*$desde_valor = explode("/",$this->request->data['desde']);
            $desde_valor = $desde_valor[2]."-".$desde_valor[1]."-".$desde_valor[0];

            $hasta_valor = explode("/",$this->request->data['hasta']);
            $hasta_valor = $hasta_valor[2]."-".$hasta_valor[1]."-".$hasta_valor[0];*/

            $cajero_descripcion = "Todos";
            //BUSCAR NOMBRE CAJERO
            $cajero = $id_cajero;
            if(!empty($cajero)){
                $cajero_nombre = $connection->execute("SELECT nombre 
                                                   FROM usuarios WHERE id=".$id_cajero);
                $cajero_descripcion = "";
                foreach ($cajero_nombre as $nom){
                    $cajero_descripcion = $nom['nombre'];
                }
            }

            $connection->execute("DELETE FROM cajas_tmp 
                                  WHERE id_empresa=3 
                                  AND id_usuario=".$id_cajero);


            /********CONSULTAR DE CLIENTES*************/
            $query_cliente = "SELECT a.id as id,
                      CONCAT(c.descripcion,' - ',e.descripcion) as descripcion,  
                      a.documento as docu,
                      a.fecha as fecha,
                      if(c.tipo='debe',a.monto,0) as entra,
                      a.id_moneda as moneda
                      FROM cajas a
                      INNER JOIN cuentas_cajas c ON a.id_cuenta_caja=c.id
                      INNER JOIN clientes e ON a.id_cliente=e.id 
                      WHERE 
                      a.estado=1 AND 
                      a.id_apertura=".$id." AND
                      a.id_cajero = ".$id_cajero." AND
                      a.id_empresa = 3
                      ORDER BY a.documento asc";

            //echo $id." - ".$fecha." - ".$id_cajero;
            //die();
            //echo "SQL: ".$query_cliente."<br>";die();
            $results_cliente = $connection->execute($query_cliente);

            foreach ($results_cliente as $valor){
                $sql_cliente = "INSERT INTO `cajas_tmp` 
                   (`id`, `descripcion`, `docu`, `fecha`, `entra`, 
                   `sale`, `id_empresa`, `id_usuario`,`id_moneda`) 
                   VALUES (".$valor['id'].", '".$valor['descripcion']."', '".$valor['docu']."', '".$valor['fecha']."',
                    '".$valor['entra']."','0', '3', '".$id_cajero."',".$valor['moneda'].");";
                $connection->execute($sql_cliente);
            }

            /********CONSULTAR DE PROVEEDORES*************/

            $query_proveedor = "SELECT a.id as id,
                      CONCAT(c.descripcion,' - ',e.descripcion) as descripcion,  
                      a.documento as docu,
                      a.fecha as fecha,
                      if(c.tipo='haber',a.monto,0) as sale,
                      a.id_moneda as moneda
                      FROM cajas a
                      INNER JOIN cuentas_cajas c ON a.id_cuenta_caja=c.id
                      INNER JOIN proveedores e ON a.id_proveedor=e.id 
                      WHERE 
                      a.estado=1 AND 
                      a.id_apertura=".$id." AND
                      a.id_cajero = ".$id_cajero." AND
                      a.id_empresa = 3
                      ORDER BY a.documento asc";

            //echo $query_proveedor;die();
            $results_prov = $connection->execute($query_proveedor);

            foreach ($results_prov as $valor_prov){
                $sql_prov = "INSERT INTO `cajas_tmp` 
                   (`id`, `descripcion`, `docu`, `fecha`, `entra`, 
                   `sale`, `id_empresa`, `id_usuario`,`id_moneda`) 
                   VALUES (".$valor_prov['id'].", '".$valor_prov['descripcion']."', '".$valor_prov['docu']."', '".$valor_prov['fecha']."',
                    '0','".$valor_prov['sale']."', '3', '".$id_cajero."',".$valor_prov['moneda'].");";
                //cho $sql_prov."<br>";

                $connection->execute($sql_prov);
            }


            $query = "SELECT id, descripcion, docu, fecha, entra, sale 
                                     FROM cajas_tmp 
                                     WHERE id_empresa=3 AND 
                                     id_moneda=".$id_moneda." AND
                                     id_usuario=".$id_cajero." ORDER BY id,docu asc";
            //echo $query;die();
            $results_tmp = $connection->execute($query);

            if(count($results_tmp)<=0){
                $saldo_inicial = 0;
                $total_debe = 0;
                $total_sale = 0;
                $saldo_final = 0;
            }else{

                $query_saldo = "SELECT monto
                    FROM aperturas_cajas WHERE
                    id='".$id."' AND
                    id_empresa = 3 AND 
                    id_cajero = ".$id_cajero."
                    ORDER BY monto desc LIMIT 1";

                //echo $query_saldo;die();
                $results_saldo = $connection->execute($query_saldo);

                $saldo_inicial = 0;
                $total_debe = 0;
                $total_sale = 0;
                $saldo_final = 0;
                foreach($results_saldo as $value){
                    $saldo_inicial = $value['monto'];
                }

                foreach($results_tmp as $value_query){
                    $total_debe = $total_debe + $value_query['entra'];
                    $total_sale = $total_sale + $value_query['sale'];
                }

                $saldo_final = ($saldo_inicial + $total_debe) - $total_sale;

            };

            $file = "informes/arque_caja/arque2.jrxml";

            $PHPJasperXML = new \PHPJasperXML();
            $PHPJasperXML->arrayParameter=array("parameter1"=>1,
                "parametro_empresa"=>$empresa_descripcion,
                "factura"=>"Nro.",
                "direccion"=>$empresa_direccion,
                "ruc"=>$empresa_ruc,
                "contacto"=>$empresa_contacto,
                "fecha"=>$hoy,
                "usuario"=>$cajero_descripcion,
                "saldoal"=>"MIO",
                "cajero"=>$cajero_descripcion,
                "moneda"=>$moneda_descrip,
                "local"=>"MIO",
                "query"=>$query,
                "total_factura"=>"Total Por Factura",
                "total_cliente"=>"MIO",
                "total_general"=>"Total General",
                "empresa_software"=>"Todos los derechos reservados.",
                "empresa_descripcion"=>"RestorApp S.A - 0986 669 700",
                "pagina"=>"Pag. Nro.",
                "saldoInicial"=>number_format($saldo_inicial),
                "saldoFinal"=>number_format($saldo_final),
                "totalDebe"=>number_format($total_debe),
                "totalHaber"=>number_format($total_sale),
                "arquedia"=>$desde,
                "fecha_impresion"=>"Fecha Impresion:".$hoy,
                "hora_impresion"=>"Hora Impresion:".$hora);

            $PHPJasperXML->load_xml_file($file);
            $server="localhost";
            $db="integralix";
            $user="root";
            $pass="integra!1900";
            //$pass="20.prd.100";
            $version="0.9d";
            $pgport=5432;
            $pchartfolder="./class/pchart2";
            $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);

            //ob_end_clean();
            if (ob_get_length() > 0 ) {
                ob_end_clean();
            }
            //$PHPJasperXML->outpage("I");
            $PHPJasperXML->outpage("F","detalle_caja_".$id_cajero.".pdf");
            $connection->execute("DELETE FROM cajas_tmp 
            WHERE id_empresa=3 AND id_usuario=".$id_cajero);

        }catch (\PDOException $e) {
            $error = 'No se puede borrar los datos. Esta asociado con otra clase.';
            // The exact error message is $e->getMessage();
            //var_dump($e);
        }

        return;

    }

    public function enviarCorreo($values)
    {
        $to = $values["to"];
        $subject = "[ARQUEO DE CAJA DELEITE - ".$values['fecha']."]";

        $message = '
        <html xmlns="http://www.w3.org/1999/xhtml">
    
        <head>
            <meta name="viewport" content="width=device-width">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head>
    
        <body bgcolor="#FFFFFF">
            <table bgcolor="#337ab7" style="width: 100%;">
                <tbody>
                    <tr>
                        <td>
                            <table bgcolor="#337ab7" style="width: 100%; padding-left: 25px; padding-right: 25px; padding-top: 5px; padding-bottom: 5px;">
                                <tbody>
                                    <tr>
                                        <td><center><img src="http://datalapp.com/img/screenshot/datalapp.fw.png" width="300" height="125"></center></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
    
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td bgcolor="#FFFFFF">
                            <table style="width: 100%; padding-left: 25px; padding-right: 25px;">
                                <tbody>
                                    <tr>
                                        <td>
                                                        
                                            <table style="width: 100%; background-color: #f6f7f8; border: 1px solid #e4e8ed; padding-left: 15px; padding-right: 15px;">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <table align="left">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            
                                                                               <p style="font-size: 13.5px; color: #666666; margin-bottom: 7px;">'.$values['descripcion'].'</p> 
                                                                                <br>     
                                                                                <table border="1" width="400" style="color:black; background-color: #d8d8d8; border: 1px;">
                                                                                  <tr>
                                                                                    <th>Monto de apertura:</th>
                                                                                    <td align="center"><strong>'.$values['apertura'].'</strong></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                    <th>Total Ingreso:</th>
                                                                                    <td align="center"><strong>'.$values['debe'].'</td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                    <th>Total Egreso:</th>
                                                                                    <td align="center"><strong>'.$values['haber'].'</td>
                                                                                  </tr>
                                                                                   <tr>
                                                                                    <th>Monto cierre:</th>
                                                                                    <td align="center"><strong>'.$values['cierre'].'</td>
                                                                                  </tr>

                                                                                  <tr>
                                                                                    <th>Saldo Final:</th>
                                                                                    <td align="center"><strong>'.$values['saldo'].'</td>
                                                                                  </tr>

                                                                                </table>
                                                                            


                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <p style="font-size: 12px; color: #1A1A1A; margin-bottom: 7px;"><i>
                                            "Vale informar, que el correo electrónico info@contalapp.com es aplicable exclusivamente a la remisión automática de las notificaciones del servicio, por lo tanto, rogamos se abstenga a responder y/o dirigir consultas adicionales con destino a la misma.".
                                           </i> </p>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html>';

        $email_to = "jorgedavidc99@gmail.com";
        $email_to2 = "jorgedavid_24@gmail.com";

        $email = new Email();
        $email ->transport('mailjet')
            ->emailFormat('html')
            ->to($email_to)
            ->addTo($email_to2)
            ->from('info@datalapp.com')
            ->subject($subject);
           // ->attachments(array('detalles_deleite.pdf'));
        $email->send($message);
        return;

    }

}