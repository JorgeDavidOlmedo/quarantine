<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuariosEmpresa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosEmpresa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usuarios Empresas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuariosEmpresas form large-9 medium-8 columns content">
    <?= $this->Form->create($usuariosEmpresa) ?>
    <fieldset>
        <legend><?= __('Edit Usuarios Empresa') ?></legend>
        <?php
            echo $this->Form->input('id_usuario');
            echo $this->Form->input('id_empresa');
            echo $this->Form->input('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
