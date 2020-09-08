<?= $this->Html->script('controladores/menu/controllerHome.js?v='.@$_SESSION['version']);?>
<?php
$inicial = $this->request->session()->read("fecha_ini");
$final = $this->request->session()->read("fecha_fin");
?>
<div class="menu" ng-controller="homeIndex">
        <div id="col-content" class="dashboard-top-bar">
            <input class="myBuild" id="myBuild" value="" type="hidden">
            <ol class="breadcrumb hidden">
                <li><a href="#"><?php echo __("TABLERO", true);?></a>  </li>
                <div id="dashboard_fiter">
                    <div class="row">

                    </div>
                </div>
            </ol>

              <input class="myBuild" id="myBuild" value="" type="hidden">
                <ol class="breadcrumb">

                        <li><a href="#"><?php echo __("DASHBOARD", true);?></a>  </li>
                    <a id="drop2" href="#" class="dropdown-toggle" data-toggle="modal" data-target="#modal-fullscreen" aria-haspopup="true" role="button" aria-expanded="false">
                        
                        </a>
                    <div id="dashboard_fiter">

                        
                    </div>
                </ol>

       </div>

       <div class="wrapper wrapper-content">
 

            <div class="row">

                    <div class="col-lg-3">
                        <div class="ibox float-e-margins consul">
                            <div class="ibox-content" ng-click="ingresar()">
                                    <h1 class="no-margins"><strong>INGRESAR AL PAÍS</strong></h1>
                                <div class="stat-percent font-bold text-success"><i class=""></i></div>


                            </div>
                        </div>
                    </div>

        <div class="col-lg-3">
            <div class="ibox float-e-margins consul">
                <div class="ibox-content" ng-click="consultaIngresos()">
                    <h1 class="no-margins"><strong>CONSULTAS DE INGRESO</strong></h1>
                    <div class="stat-percent font-bold text-success"><i class=""></i></div>

                </div>
            </div>
        </div>

       </div>

   </div>

    <div class="modal fade mymodal" id="form-change" tabindex="-1" role="dialog" aria-labelledby="form-change" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><h4><div id="one">INGRESAR AL PAÍS</div></h4></strong>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <?php
                            echo $this->Form->input('documento',array(
                                'class' => 'form-control','label'=>'NRO. DOCUMENTO',
                                'data-live-search'=>true,
                                'ng-model'=>'q',
                                'autocomplete'=>'off','type'=>'number'));

                            ?>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 busc">

                            <button class="btn-sm btn btn-primary" type="button"
                                    title="Busqueda Avanzada" tabindex="-1"
                                    data-provider="bootstrap-markdown"
                                    data-handler="bootstrap-markdown-cmdPreview" data-hotkey="Ctrl+B"
                                    data-toggle="button" aria-pressed="false" ng-click="buscarCov()">
                                <span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <?php
                            echo $this->Form->input('nombre',array('class' => 'form-control','type'=>'text',
                                'autocomplete'=>'off',
                                'ng-model'=>'nombre',
                                'label'=>"NOMBRE Y APELLIDO"));
                            ?>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <?php
                            echo $this->Form->input('direccion',array('class' => 'form-control','type'=>'text',
                                'autocomplete'=>'off',
                                'ng-model'=>'direccion',
                                'label'=>"DIRECCIÓN"));
                            ?>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" ng-click="salir()">SALIR</button>
                    <input type="hidden" name="myValue" id="myValue" value=""/>
                    <?= $this->Form->button(__('REGISTRAR'),['class'=>'btn btn-info','ng-click'=>'guardar()']) ?>


                </div>
            </div>
        </div>


</div>



    <div class="modal fade mymodal" id="form-consulta" tabindex="-1" role="dialog" aria-labelledby="form-change" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><h4><div id="one">CONSULTAS</div></h4></strong>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <?php
                            echo $this->Form->input('documento_c',array(
                                'class' => 'form-control','label'=>'NRO. DOCUMENTO',
                                'data-live-search'=>true,
                                'ng-model'=>'q_c',
                                'id'=>'documento_c',
                                'autocomplete'=>'off','type'=>'number'));

                            ?>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 busc">

                            <button class="btn-sm btn btn-primary" type="button"
                                    title="Busqueda Avanzada" tabindex="-1"
                                    data-provider="bootstrap-markdown"
                                    data-handler="bootstrap-markdown-cmdPreview" data-hotkey="Ctrl+B"
                                    data-toggle="button" aria-pressed="false" ng-click="buscarIngreso()">
                                <span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                        </div>

                    </div>


                    <div class="row" style="display: {{visible}};">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <?php
                            echo $this->Form->input('nombre_c',array('class' => 'form-control','type'=>'text',
                                'autocomplete'=>'off',
                                'id'=>'nombre_c',
                                'ng-model'=>'nombre_c',
                                'label'=>"NOMBRE Y APELLIDO"));
                            ?>

                        </div>

                    </div>

                    <div class="row" style="display: {{visible}};">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <?php
                            echo $this->Form->input('ingreso',array('class' => 'form-control','type'=>'text',
                                'autocomplete'=>'off',
                                'ng-model'=>'ingreso',
                                'label'=>"DÍA INGRESO",
                                'disabled'));
                            ?>

                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <?php
                            echo $this->Form->input('ingreso',array('class' => 'form-control','type'=>'text',
                                'autocomplete'=>'off',
                                'ng-model'=>'hora',
                                'label'=>"HORA INGRESO",
                                'disabled'));
                            ?>

                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <?php
                            echo $this->Form->input('cuarentena',array('class' => 'form-control','type'=>'text',
                                'autocomplete'=>'off',
                                'ng-model'=>'cuarentena',
                                'label'=>"CUARENTENA",
                                'disabled'));
                            ?>

                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label class="{{color}}" id="{{color}}">{{mensaje}}</label>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" ng-click="salirConsulta()">SALIR</button>
                    <input type="hidden" name="myValue" id="myValue" value=""/>
                    <?= $this->Form->button(__('INFORMAR'),['class'=>'btn btn-info','ng-click'=>'informar()']) ?>


                </div>
            </div>
        </div>


    </div>



</div>



<style>
    .float-e-margins {
        background-color: rgba(48, 59, 64, 0.24);
    }
    .consul{
        cursor: pointer;
    }



    .consul:hover{
        background-color: rgba(67, 113, 255, 0.4);
    }

    .busc{
        margin-top: 25px;
    }

    #holdon-overlay{
        background: rgb(0, 108, 111);
    }

    .sk-bounce > div {
        width: 18px;
        height: 18px;
        background-color: #eae0e0;
        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }

    @media screen and (max-width: 600px) {
        .busc{
            margin-top: 0px;
            margin-bottom: 10px;
        }
    }

    @media screen and (max-width: 600px) {
        .busc{
            margin-top: 0px;
            margin-bottom: 10px;
        }
    }

    #rojo{
        color: red;
        font-size: 18px;
        font-weight: bold;

    }

    #verde{
        color: green;
        font-size: 18px;
        font-weight: bold;

    }

    #azul{
        color: blue;
        font-size: 18px;
        font-weight: bold;

    }

</style>


