<?= $this->Html->script('controladores/pedidos/controller.js?v='.@$_SESSION['version']);?>
<div class="content">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('BAUTISMOS', '/Bautismos2/index/');
    $id_empresa = $this->request->session()->read('id_empresa');
    $user = $this->request->session()->read('Auth.User')['id'];
    echo $this->Html->getCrumbList();
    ?>
</div>
<div class="container" ng-controller="pedidosIndex">
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">AGREGAR</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-list']),
                        ['controller'=>'Bautismos2','action' => 'index'],['escape' => false,'class'=>'btn btn-default']) ?>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <?=$this->Form->input('fecha',array('class'=>'fechaOnly','required'))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <?=$this->Form->input('libro',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'LIBRO','autofocus'))?>
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2">
                    <?=$this->Form->input('folio',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'FOLIO'))?>
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2">
                    <?=$this->Form->input('numero',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'NUMERO'))?>
                </div>


            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <?=$this->Form->input('bautizado',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'BAUTIZADO/A'))?>
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2">
                    <?=$this->Form->input('fecha-bautismo',array('class'=>'fechaOnly','required',
                        'label'=>'FECHA BAUTISMO'))?>
                </div>

            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('presbitero',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'PRESBITERO'))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <?=$this->Form->input('nacido-en',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'NACIDO EN'))?>
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2">
                    <?=$this->Form->input('fecha-nac',array('class'=>'fechaOnly','required',
                        'label'=>'FECHA NAC.'))?>
                </div>

            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('hijo-don',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'HIJO/A DE DON'))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('hijo-donha',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'HIJO/A DE DOÑA'))?>
                </div>


            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('padrino',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'PADRINO'))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('madrina',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'MADRINA'))?>
                </div>


            </div>


            <br>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <?=$this->Form->input('obs',array('class'=>'form-control','required',
                        'type'=>'text',
                        'autocomplete'=>'off',
                        'label'=>'NOTA MARGINAL'))?>
                </div>

            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-info','ng-click'=>'guardarBaustismo()']) ?>
                    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>

                </div>
            </div>
                </div>

                <style>
                    .tabla{
                        width:auto;
                        overflow-x : scroll;
                        display: block;

                    }

                    .prod{
                        cursor: pointer;
                    }

                    .precio{
                        background-color: #F5F3F3;
                    }

                    .abrir{
                        margin-top:25px;
                    }
