<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Disposition'), ['action' => 'edit', $disposition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Disposition'), ['action' => 'delete', $disposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disposition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dispositions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disposition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Letters'), ['controller' => 'Letters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Letter'), ['controller' => 'Letters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dispositions view large-9 medium-8 columns content">
    <h3><?= h($disposition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Letter') ?></th>
            <td><?= $disposition->has('letter') ? $this->Html->link($disposition->letter->id, ['controller' => 'Letters', 'action' => 'view', $disposition->letter->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($disposition->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fromhierarchy') ?></th>
            <td><?= $this->Number->format($disposition->fromhierarchy) ?></td>
        </tr>
        <tr>
            <th><?= __('Tohierarchy') ?></th>
            <td><?= $this->Number->format($disposition->tohierarchy) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $disposition->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Question') ?></h4>
        <?= $this->Text->autoParagraph(h($disposition->question)); ?>
    </div>
    <div class="row">
        <h4><?= __('Answer') ?></h4>
        <?= $this->Text->autoParagraph(h($disposition->answer)); ?>
    </div>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($disposition->content)); ?>
    </div>
</div>
