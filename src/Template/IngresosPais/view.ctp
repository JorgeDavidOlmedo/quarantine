<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ingresos Pai'), ['action' => 'edit', $ingresosPai->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ingresos Pai'), ['action' => 'delete', $ingresosPai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingresosPai->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ingresos Pais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingresos Pai'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ingresosPais view large-9 medium-8 columns content">
    <h3><?= h($ingresosPai->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cedula') ?></th>
            <td><?= h($ingresosPai->cedula) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($ingresosPai->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($ingresosPai->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= h($ingresosPai->usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ingresosPai->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($ingresosPai->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($ingresosPai->fecha) ?></td>
        </tr>
    </table>
</div>
