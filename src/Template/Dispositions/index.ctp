<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Disposition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Letters'), ['controller' => 'Letters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Letter'), ['controller' => 'Letters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dispositions index large-9 medium-8 columns content">
    <h3><?= __('Dispositions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('letter_id') ?></th>
                <th><?= $this->Paginator->sort('fromhierarchy') ?></th>
                <th><?= $this->Paginator->sort('tohierarchy') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dispositions as $disposition): ?>
            <tr>
                <td><?= $this->Number->format($disposition->id) ?></td>
                <td><?= h($disposition->active) ?></td>
                <td><?= $disposition->has('letter') ? $this->Html->link($disposition->letter->id, ['controller' => 'Letters', 'action' => 'view', $disposition->letter->id]) : '' ?></td>
                <td><?= $this->Number->format($disposition->fromhierarchy) ?></td>
                <td><?= $this->Number->format($disposition->tohierarchy) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $disposition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $disposition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $disposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disposition->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
