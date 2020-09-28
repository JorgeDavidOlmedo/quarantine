<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bautismos2->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bautismos2->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bautismos2'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bautismos2 form large-9 medium-8 columns content">
    <?= $this->Form->create($bautismos2) ?>
    <fieldset>
        <legend><?= __('Edit Bautismos2') ?></legend>
        <?php
            echo $this->Form->input('libro');
            echo $this->Form->input('folio');
            echo $this->Form->input('numero');
            echo $this->Form->input('dia_bautismo', ['empty' => true]);
            echo $this->Form->input('presbitero');
            echo $this->Form->input('bautizo_a');
            echo $this->Form->input('nacio_en');
            echo $this->Form->input('el_dia', ['empty' => true]);
            echo $this->Form->input('hijo');
            echo $this->Form->input('de_don');
            echo $this->Form->input('donha');
            echo $this->Form->input('padrino');
            echo $this->Form->input('madrina');
            echo $this->Form->input('nota_marginal');
            echo $this->Form->input('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
