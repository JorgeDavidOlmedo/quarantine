<div class="content">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('Usuarios', '/usuarios/index/');

    echo $this->Html->getCrumbList();
    ?>
</div>
<div class="container">
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Crear Usuario</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-list']), ['controller'=>'usuarios','action' => 'index'],['escape' => false,'class'=>'btn btn-default']) ?>
                </div>
            </div>
        </div>
        <div class="panel-body">
          <?= $this->Form->create() ?>   
         <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('email',array('class'=>'form-control','required',
                        'autocomplete'=>'off','autofocus',
                        'type'=>'email'))?>
                </div>

                 <div class="col-xs-12 col-sm-4 col-md-4">
                     <?php
                       echo $this->Form->input('password',array('class' => 'form-control','label'=>'Password',
                           'autocomplete'=>'off'));
                     ?>

                    </div>
                </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('perfil',array('type'=>'select',
                        'options'=>["1" => "Administrador","0"=>"Empresa"],'class' => 'form-control','label'=>'Perfil'))?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?php
                    echo $this->Form->input('rol',array('options' => $roles,
                        'class' => 'form-control','label'=>'Rol','data-live-search'=>true));

                    ?>
               </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?php
                    echo $this->Form->input('empresa',array('options' => $empresas,
                        'class' => 'form-control','label'=>'Empresa','data-live-search'=>true));

                    ?>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('nombre',array('class' => 'form-control','label'=>'Nombre' ,'required',
                        'autocomplete'=>'off'))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('apellido',array('class' => 'form-control','label'=>'Apellido' ,'required',
                        'autocomplete'=>'off'))?>
                </div>


           </div>

            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('telefono',array('class' => 'form-control','label'=>'Telefono',
                        'autocomplete'=>'off'))?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                  <?=$this->Form->input('direccion',array('class' => 'form-control','label'=>'Direccion','required',
                      'autocomplete'=>'off'))?>
                </div>

            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-info']) ?>
                    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>

                </div>
            </div>
             <?= $this->Form->end() ?>
        </div>
    </div>
</div>
