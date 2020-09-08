<div class="content">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb($aplicacion,'/');
    $this->Html->addCrumb('Empresas', '/empresas/index/');

    echo $this->Html->getCrumbList();
    ?>
</div>
<div class="container">
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Editar Empresa</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <?= $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-list']),
                        ['controller'=>'empresas','action' => 'index'],['escape' => false,'class'=>'btn btn-default']) ?>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <?= $this->Form->create(null,array("method"=>"post","enctype"=>"multipart/form-data")) ?>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_nombre',array('class'=>'form-control','required',
                        'label'=>"Nombre",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_nombre))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_apellido',array('class'=>'form-control','required',
                        'label'=>"Apellido",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_apellido))?>
                </div>

            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('agente_documento_2',array('class'=>'form-control',
                        'label'=>"Documento",
                        'required',
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_documento_id))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('agente_nombre_empresa',array('class'=>'form-control',
                        'required',
                        'label'=>"Nombre Empresa",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_nombre_empresa))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_telefono',array('class'=>'form-control',
                        'required',
                        'label'=>"Telefono",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_telefono))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_celular',array('class'=>'form-control',
                        'label'=>"Celular",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_celular))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('agente_direccion_linea_1',array('class'=>'form-control',
                        'required',
                        'label'=>"Direccion 1",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_direccion_linea_1))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?=$this->Form->input('agente_direccion_linea_2',array('class'=>'form-control',
                        'label'=>"Direccion 2",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_direccion_linea_2))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_email',array('class'=>'form-control',
                        'label'=>"Email",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_email))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_direccion_codigo_postal',array('class'=>'form-control',
                        'label'=>"Codigo Postal",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_direccion_codigo_postal))?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?=$this->Form->input('agente_direccion_ciudad',array('class'=>'form-control',
                        'required',
                        'label'=>"Ciudad",
                        'autocomplete'=>'off','autofocus',
                        'default'=>$empresa->agente_direccion_ciudad))?>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <?php
                    echo $this->Form->input('pais',array('options' => $paises,'default'=>$empresa->agente_pais,
                        'class' => 'form-control','label'=>'Pais','data-live-search'=>true));

                    ?>
                </div>

            </div>

            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Foto</label><br>
                    <img src="../../images/<?php echo $empresa->agente_foto;?>" height="100" width="100"/><br>
                    <input name="ufile" type="file" id="ufile" size="50" />
                </div>

            </div>
            <br><br>

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

