<div class="content">
    <div class="content">
        <?php
        $aplicacion = $this->request->session()->read("aplicacion");
        $this->Html->addCrumb($aplicacion,'/');
        $this->Html->addCrumb('Empresas', '/empresas');
        $this->Html->addCrumb('Detalle','');
        echo $this->Html->getCrumbList();
        ?>
    </div>
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Empresa</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <div class="col col-xs-6 pull-right">

                        <?=$this->Html->link('Listar', ['controller' => 'Empresas', 'action' => 'index'])?>
                        <?=$this->Html->link('Agregar', ['controller' => 'Empresas', 'action' => 'add', $empresa->id])?>
                        <?=$this->Html->link('Borrar', ['controller' => 'Empresas', 'action' => 'delete', $empresa->id])?>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#usuario" role="tab" data-toggle="tab">Empresa</a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="usuario">
                    <div class="col-md-6 table-view">
                        <div class="panel">


                            <dt><?= __('Id') ?></dt>
                            <dd><?= $empresa->id ?></dd></br>

                            <dt><?= __('Nombre') ?></dt>
                            <dd><?= h($empresa->agente_nombre) ?></dd></br>

                            <dt><?= __('Apellido') ?></dt>
                            <dd><?= h($empresa->agente_apellido) ?></dd></br>

                            <dt><?= __('Documento') ?></dt>
                            <dd><?= h($empresa->agente_documento_id) ?></dd></br>

                            <dt><?= __('Telefono') ?></dt>
                            <dd><?= h($empresa->agente_telefono) ?></dd></br>

                            <dt><?= __('Celular') ?></dt>
                            <dd><?= h($empresa->agente_celular) ?></dd></br>

                            <dt><?= __('Email') ?></dt>
                            <dd><?= h($empresa->agente_email) ?></dd></br>

                            <dt><?= __('Nombre Empresa') ?></dt>
                            <dd><?= h($empresa->agente_nombre_empresa) ?></dd></br>

                            <dt><?= __('Foto') ?></dt>
                            <dd><img src="../../images/<?php echo $empresa->agente_foto;?>" height="300" width="400"/></dd></br>


                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<style>

    .standar{
        cursor: pointer;
        font-size: 16px;
        padding: 5px;
    }

</style>
