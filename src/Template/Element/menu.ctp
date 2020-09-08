<?= $this->Html->script('controladores/menu/controllerMenu.js?v='.@$_SESSION['version']);?>
<?php
$id_empresa = $this->request->session()->read('id_empresa');
$empresa = $this->request->session()->read('empresa');
$rol_usuario= $this->request->session()->read('Auth.User.rol');
$month = date('m');
$year = date('Y');
$primer= date('Y-m-d', mktime(0,0,0, $month, 1, $year));
//   $datetime = new DateTime();
$hoy = date("Y-m-d");
?>
<div ng-app="contalapp">
<div class="container-fuild" ng-controller="menuIndex">

<?php if(isset($current_user)): ?>
    <nav id="top-menu" class="navbar navbar-inverse navbar-static">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <?php echo $this->Html->link('QUARANTINE PY',array('controller'=>'pages', 'action'=>'index'), array('class'=>'navbar-brand', 'title'=>__("QUARANTINE PY", true)));?>
            </div>
            <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                            <?php echo  "REGISTROS" ?>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">


                            <li><a  <?= $this->Html->link($this->Html->tag('span','',
                                        ['class' => '']).'INGRESOS AL PAÍS', ['controller' => 'IngresosPais','action' => 'index'],['escape' => false])?></a></li>
                            <li class="divider"></li>


                        </ul>
                    </li>

                </ul>


                <ul id="topmenu-dropdown" class="nav navbar-nav navbar-right">
                    <li id="fat-menu" class="dropdown">
                        <a id="myAccountMenu" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">

                            <span id="username"><strong>HOLA&nbsp;<?= $this->request->session()->read('Auth.User')['nombre']?> </strong></span>&nbsp;
                           </a>


                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">

                            <li role="presentation" style="  border-top: 1px solid #ccc;
                            padding-top: 10px;"><?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-off']).' SALIR',array('controller'=>'usuarios', 'action'=>'logout'), ['escape' => false]);?></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<?php endif; ?>



<style>
  .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
            color: #fff;
            background-color: rgb(116, 175, 199);;
        }

        .float-e-margins {
            background-color: rgba(12, 98, 137, 0.24);
        }
</style>
