<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Hierarchy'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hierarchies index large-9 medium-8 columns content">
    <h3><?= __('Hierarchies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hierarchies as $hierarchy): ?>
            <tr>
                <td><?= $this->Number->format($hierarchy->id) ?></td>
                <td><?= $hierarchy->has('parent_hierarchy') ? $this->Html->link($hierarchy->parent_hierarchy->name, ['controller' => 'Hierarchies', 'action' => 'view', $hierarchy->parent_hierarchy->id]) : '' ?></td>
                <td><?= h($hierarchy->name) ?></td>
                <td><?= h($hierarchy->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hierarchy->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hierarchy->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hierarchy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hierarchy->id)]) ?>
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
