<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Evidence'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Letters'), ['controller' => 'Letters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Letter'), ['controller' => 'Letters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evidences index large-9 medium-8 columns content">
    <h3><?= __('Evidences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('letter_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evidences as $evidence): ?>
            <tr>
                <td><?= $this->Number->format($evidence->id) ?></td>
                <td><?= $evidence->has('user') ? $this->Html->link($evidence->user->id, ['controller' => 'Users', 'action' => 'view', $evidence->user->id]) : '' ?></td>
                <td><?= $evidence->has('letter') ? $this->Html->link($evidence->letter->id, ['controller' => 'Letters', 'action' => 'view', $evidence->letter->id]) : '' ?></td>
                <td><?= h($evidence->name) ?></td>
                <td><?= h($evidence->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evidence->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evidence->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidence->id)]) ?>
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
