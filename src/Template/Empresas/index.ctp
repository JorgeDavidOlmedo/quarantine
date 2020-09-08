<?= $this->Html->script('controladores/svp/rolesController');?>
<div class="content" ng-app="svp" ng-controller="usuarioIndex">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('Empresas', '');

    echo $this->Html->getCrumbList();
    ?>
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Empresas</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-plus']),
                        ['controller'=>'empresas','action' => 'add'],['escape' => false,'class'=>'btn btn-symbol']) ?>


                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="search-box">

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <?=$this->Form->input('buscador',array("id"=>"filtrar",'label'=>'','type'=>'text','placeholder'=>'Buscar...','class'=>'search form-control buscador','name'=>'filtrar'))?>
                    </div>
                </div>

            </div>

            <table class="table table-responsive table-striped table-bordered table-list table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Telefono</th>
                    <th>Nombre Empresa</th>
                    <th>Foto</th>
                    <th  width="10%" class="text-center actions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></th>
                </tr>

                </thead>
                <tbody class="buscar">

                <?php foreach ($empresas as $value):?>
                    <tr>

                        <td><?= $value->id ?></td>
                        <td><?= $value->has('agente_nombre') ? $this->Html->link($value->agente_nombre, ['controller' => 'Empresas', 'action' => 'view', $value->id]) : '' ?></td>
                        <td><?= $value->agente_apellido?></td>
                        <td><?= $value->agente_documento_id ?></td>
                        <td><?= $value->agente_telefono ?></td>
                        <td><?= $value->agente_nombre_empresa ?></td>
                        <?php if(empty($value->agente_foto)):?>
                            <td>Sin foto</td>
                        <?php else:?>
                            <td><img src="images/<?php echo $value->agente_foto;?>" height="42" width="42"/></td>
                        <?php endif;?>


                        <td class="actions">
                            <?=$this->Html->link('Editar', ['controller' => 'empresas', 'action' => 'edit', $value->id])?>
                            <?=$this->Html->link('Borrar', ['controller' => 'empresas', 'action' => 'delete', $value->id])?>
                        </td>

                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>

            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>

            </div>

        </div>

    </div>
</div>

