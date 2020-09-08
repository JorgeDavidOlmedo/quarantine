<?= $this->Html->script('controladores/usuariosEmpresas/controller');?>
<div class="content" ng-app="contalapp" ng-controller="usuarioEmpresaIndex">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('Usuarios po Empresas', '');

    echo $this->Html->getCrumbList();
    ?>
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Usuarios por Empresas</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-plus']), ['controller'=>'UsuariosEmpresas','action' => 'add'],['escape' => false,'class'=>'btn btn-symbol']) ?>

                    <a href="javascript:void(0);" class="search_btn btn btn-symbol" ng-click="focus_buscar()">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>

                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="search-box">

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <?=$this->Form->input('buscador',array("id"=>"search",'ng-model'=>'q','label'=>'','type'=>'text','placeholder'=>'Buscar...','class'=>'search form-control buscador','name'=>'search'))?>
                    </div>
                </div>

            </div>


            <table class="table table-responsive table-striped table-bordered table-list table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>

                    <th>Empresa</th>
                    <th  width="10%" class="text-center actions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></th>
                </tr>

                </thead>
                <tbody>

                     <?php foreach ($usuarios as $value):?>
                       <tr>

                         <td><?= $this->Number->format($value->id) ?></td>
                         <td><?= $value->usuario->has('nombre') ? $this->Html->link($value->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $value->usuario->id]) : '' ?></td>
                         
                         <td><strong><?= $value->empresa->descripcion;?></strong></td>

                           <td class="actions">
                            <a class="glyphicon glyphicon-pencil standar" ng-click = "obtener_entity(<?php echo $value->id;?>)"></a>
                            <a class="glyphicon glyphicon-remove standar" ng-click = "borrar_entity(<?php echo $value->id;?>)"></a>
                        </td>

                       </tr>
                     <?php endforeach;?>

                </tbody>
            </table>

            <div class="paginator">
                <ul class="pagination">
                    <button class="btn btn-default" ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
                        Previous
                    </button><strong>{{currentPage+1}}/{{numberOfPages()}}</strong>
                    <button class="btn btn-default" ng-disabled="currentPage >= getData().length/pageSize - 1" ng-click="currentPage=currentPage+1">
                        Next
                    </button>
                </ul>

            </div>
        </div>

    </div>
</div>

<?= $this->Html->script(['search']) ?>
<?= $this->fetch('script') ?>

<style>

    td{
        background-color: white;
    }

    .standar{
        cursor: pointer;
        font-size: 14px;

    }


</style>
