<?= $this->Html->script('controladores/ingresos/controller.js?v='.@$_SESSION['version']);?>
<div class="content" ng-controller="ingresosIndex">
    <?php
    $aplicacion = $this->request->session()->read("aplicacion");
    $this->Html->addCrumb('DASHBOARD','/');
    $this->Html->addCrumb('BAUTISMOS', '');
    echo $this->Html->getCrumbList();
    ?>
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">BAUTISMOS</h3>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="search-box">

                <div class="row">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <?=$this->Form->input('libro',
                            array("id"=>"libro",'label'=>'LIBRO',
                                'type'=>'text','placeholder'=>'Buscar...',
                                'class'=>'search form-control buscador',
                                'required',
                                'autocomplete'=>'off',
                                'style'=>"text-transform:uppercase;",
                                'onkeyup'=>"javascript:this.value=this.value.toUpperCase();",
                                'ng-keyup'=>'getIngresosBusqueda()','autofocus'))?>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <?=$this->Form->input('folio',
                            array("id"=>"folio",'label'=>'FOLIO',
                                'type'=>'text','placeholder'=>'Buscar...',
                                'class'=>'search form-control buscador',
                                'required',
                                'autocomplete'=>'off',
                                'style'=>"text-transform:uppercase;",
                                'onkeyup'=>"javascript:this.value=this.value.toUpperCase();",
                                'ng-keyup'=>'getIngresosBusqueda()'))?>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <?=$this->Form->input('numero',
                            array("id"=>"numero",'label'=>'NUMERO',
                                'type'=>'text','placeholder'=>'Buscar...',
                                'class'=>'search form-control buscador',
                                'required',
                                'autocomplete'=>'off',
                                'style'=>"text-transform:uppercase;",
                                'onkeyup'=>"javascript:this.value=this.value.toUpperCase();",
                                'ng-keyup'=>'getIngresosBusqueda()'))?>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <?=$this->Form->input('don',
                            array("id"=>"don",'label'=>'DON',
                                'type'=>'text','placeholder'=>'Buscar...',
                                'class'=>'search form-control buscador',
                                'required',
                                'autocomplete'=>'off',
                                'style'=>"text-transform:uppercase;",
                                'onkeyup'=>"javascript:this.value=this.value.toUpperCase();",
                                'ng-keyup'=>'getIngresosBusqueda()'))?>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <?=$this->Form->input('donha',
                            array("id"=>"donha",'label'=>'DOÑA',
                                'type'=>'text','placeholder'=>'Buscar...',
                                'class'=>'search form-control buscador',
                                'required',
                                'autocomplete'=>'off',
                                'style'=>"text-transform:uppercase;",
                                'onkeyup'=>"javascript:this.value=this.value.toUpperCase();",
                                'ng-keyup'=>'getIngresosBusqueda()'))?>
                    </div>



                </div>
                <button class="brn btn-primary" ng-click="agregarBasutismo()">AGREGAR</button>
            </div>
            <br>
            <div class="tabla">
                <table class="table table-responsive table-striped table-bordered table-list table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>LIBRO</th>
                        <th>FOLIO</th>
                        <th>NUMERO</th>
                        <th>BAUTIZADO/A</th>
                        <th>FECHA BAUTISMO</th>
                        <th>PRESBITERO</th>
                        <th>NACIDO EN</th>
                        <th>FECHA NAC.</th>
                        <th>DON</th>
                        <th>DOÑA</th>

                    </tr>

                    </thead>
                    <tbody class="items" ng-repeat="a in ingresos">
                    <tr>
                        <td><a>{{a.id}}</a></td>
                        <td ><a>{{a.libro}}</a></td>
                        <td ><a>{{a.folio}}</a></td>
                        <td ><a>{{a.numero}}</a></td>
                        <td ><a>{{a.bautizo_a}}</a></td>
                        <td ><a>{{a.dia_bautismo}}</a></td>
                        <td ><a>{{a.presbitero}}</a></td>
                        <td ><a>{{a.nacido_en}}</a></td>
                        <td ><a>{{a.el_dia}}</a></td>
                        <td ><a>{{a.de_don}}</a></td>
                        <td ><a>{{a.donha}}</a></td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

<style>
    .tabla{
        width:auto;
        overflow-x : scroll;
        display: block;

    }

    .pago{
        /* width: 100%; */
        height: 30px;
        /* padding: 6px 12px; */
        font-size: 8px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc
    }

    .verde{
        background-color: rgba(0, 128, 0, 0.76);
        font-weight: bold;
        color: white;
    }

    .azul{
        background-color: rgba(15, 10, 212, 0.89);
        font-weight: bold;
        color: white;
    }

    #rojo{
        background-color: rgba(255, 0, 0, 0.42);
        font-weight: bold;
        color: white;
    }

    a{
        cursor: pointer;
    }

    .confirmado{
        color: blue;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .entregado{
        color: green;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .retirado{
        color: #8a6d3b;
        font-weight: bold;
        margin-bottom: 20px;
    }

    #gridverde{
        background-color: #00800047;

    }

    #gridazul{
        background-color: #0f6fff75;

    }

    #gridmarron{
        background-color: #8a6d3b73;

    }

</style>