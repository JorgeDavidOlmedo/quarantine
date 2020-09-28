<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'BAUTISMOS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min','jquery-ui.min','toastr','sweetalert','HoldOn',
        'bootstrap-datetimepicker','jquery-ui']) ?>

     <?= $this->Html->script(['jquery-1.12.4.min','bootstrap.min',
     'jquery-ui.min',
     'moment',
     'bootstrap-select.min',
     'bootstrap-datetimepicker',
     'bootstrap-select.min',
     'buscar',
     'toastr.min',
     'sweetalert',
     'angular.min',
     'angular.js?v='.@$_SESSION['version'],
         'funciones',
         'ui-bootstrap-tpls-2.4.0.min',
         'HoldOn',
         'numeral']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <?= $this->element('menu');?>

    <?= $this->Flash->render() ?>
    <div class="container-fluid">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>
</body>
</html>

