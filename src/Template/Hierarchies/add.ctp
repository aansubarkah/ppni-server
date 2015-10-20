<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hierarchies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Hierarchies'), ['controller' => 'Hierarchies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Hierarchy'), ['controller' => 'Hierarchies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hierarchies form large-9 medium-8 columns content">
    <?= $this->Form->create($hierarchy) ?>
    <fieldset>
        <legend><?= __('Add Hierarchy') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentHierarchies]);
            echo $this->Form->input('name');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
