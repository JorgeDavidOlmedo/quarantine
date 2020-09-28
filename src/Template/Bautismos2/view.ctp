<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bautismos2'), ['action' => 'edit', $bautismos2->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bautismos2'), ['action' => 'delete', $bautismos2->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bautismos2->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bautismos2'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bautismos2'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bautismos2 view large-9 medium-8 columns content">
    <h3><?= h($bautismos2->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Libro') ?></th>
            <td><?= h($bautismos2->libro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio') ?></th>
            <td><?= h($bautismos2->folio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($bautismos2->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Presbitero') ?></th>
            <td><?= h($bautismos2->presbitero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bautizo A') ?></th>
            <td><?= h($bautismos2->bautizo_a) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nacio En') ?></th>
            <td><?= h($bautismos2->nacio_en) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hijo') ?></th>
            <td><?= h($bautismos2->hijo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('De Don') ?></th>
            <td><?= h($bautismos2->de_don) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Donha') ?></th>
            <td><?= h($bautismos2->donha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Padrino') ?></th>
            <td><?= h($bautismos2->padrino) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Madrina') ?></th>
            <td><?= h($bautismos2->madrina) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nota Marginal') ?></th>
            <td><?= h($bautismos2->nota_marginal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bautismos2->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($bautismos2->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dia Bautismo') ?></th>
            <td><?= h($bautismos2->dia_bautismo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('El Dia') ?></th>
            <td><?= h($bautismos2->el_dia) ?></td>
        </tr>
    </table>
</div>
