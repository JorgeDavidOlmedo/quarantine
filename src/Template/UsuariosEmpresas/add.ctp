<?= $this->Html->script('controladores/usuariosEmpresas/controller');?>
<div class="content">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('Usuarios por Empresas', '/UsuariosEmpresas/index');

    echo $this->Html->getCrumbList();
    ?>
</div>
<div class="container" ng-app="contalapp" ng-controller="usuarioEmpresaAdd">
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Crear Usuarios por Empresa</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-list']), ['controller'=>'usuariosEmpresas','action' => 'index'],['escape' => false,'class'=>'btn btn-default']) ?>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('usuario',array('class'=>'form-control','label'=>'Usuario','ng-model'=>'usuario','uib-typeahead-editable'=>"false" ,'uib-typeahead'=>'p as p.nombre for p in usuarios($viewValue)','placeholder'=>'Tipear Usuario', 'required'))?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('empresa',array('class'=>'form-control','label'=>'Empresa','ng-model'=>'empresa','uib-typeahead-editable'=>"false" ,'uib-typeahead'=>'p as p.descripcion for p in empresas($viewValue)','placeholder'=>'Tipear Empresa','required'))?>
                </div>
            </div>



            <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-info','ng-click'=>'guardar()']) ?>
                    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>

                </div>
            </div>

        </div>
    </div>
</div>