<?= $this->Html->script('controladores/svp/usuariosController');?>
<div class="content" ng-app="svp" ng-controller="usuarioIndex">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('Usuarios', '');

    echo $this->Html->getCrumbList();
    ?>
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Usuarios</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-plus']), ['controller'=>'usuarios','action' => 'add'],['escape' => false,'class'=>'btn btn-symbol']) ?>


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
                    <th>Usuario</th>
                    <th>Es Admin</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    
                    <th  width="10%" class="text-center actions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></th>
                </tr>

                </thead>
                <tbody class="buscar">

                     <?php foreach ($usuarios as $value):?>
                       <tr>

                         <td><?= $this->Number->format($value->id) ?></td>
                         <td><?= $value->has('nombre') ? $this->Html->link($value->nombre, ['controller' => 'Usuarios', 'action' => 'view', $value->id]) : '' ?></td>

                           <?php if($value->es_admin==0):?>
                           <td>No</td>
                           <?php else:?>
                               <td>Si</td>
                           <?php endif;?>
                         <td><?= $value->email; ?></td>
                         <td><?= $value->telefono; ?></td>
                         
                           <td class="actions">
                           <?=$this->Html->link('Editar', ['controller' => 'Usuarios', 'action' => 'edit', $value->id])?>
                            <?=$this->Html->link('Borrar', ['controller' => 'Usuarios', 'action' => 'delete', $value->id])?>
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

