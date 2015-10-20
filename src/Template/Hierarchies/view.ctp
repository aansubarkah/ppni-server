<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hierarchy'), ['action' => 'edit', $hierarchy->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hierarchy'), ['action' => 'delete', $hierarchy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hierarchy->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hierarchies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hierarchy'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Hierarchies'), ['controller' => 'Hierarchies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Hierarchy'), ['controller' => 'Hierarchies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hierarchies view large-9 medium-8 columns content">
    <h3><?= h($hierarchy->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Hierarchy') ?></th>
            <td><?= $hierarchy->has('parent_hierarchy') ? $this->Html->link($hierarchy->parent_hierarchy->name, ['controller' => 'Hierarchies', 'action' => 'view', $hierarchy->parent_hierarchy->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($hierarchy->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($hierarchy->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $hierarchy->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Hierarchies') ?></h4>
        <?php if (!empty($hierarchy->child_hierarchies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hierarchy->child_hierarchies as $childHierarchies): ?>
            <tr>
                <td><?= h($childHierarchies->id) ?></td>
                <td><?= h($childHierarchies->parent_id) ?></td>
                <td><?= h($childHierarchies->name) ?></td>
                <td><?= h($childHierarchies->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Hierarchies', 'action' => 'view', $childHierarchies->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Hierarchies', 'action' => 'edit', $childHierarchies->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hierarchies', 'action' => 'delete', $childHierarchies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childHierarchies->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
