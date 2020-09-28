<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ingresosPai->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ingresosPai->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ingresos Pais'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ingresosPais form large-9 medium-8 columns content">
    <?= $this->Form->create($ingresosPai) ?>
    <fieldset>
        <legend><?= __('Edit Ingresos Pai') ?></legend>
        <?php
            echo $this->Form->input('fecha', ['empty' => true]);
            echo $this->Form->input('cedula');
            echo $this->Form->input('nombre');
            echo $this->Form->input('direccion');
            echo $this->Form->input('usuario');
            echo $this->Form->input('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
