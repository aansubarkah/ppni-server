<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dispositions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Letters'), ['controller' => 'Letters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Letter'), ['controller' => 'Letters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dispositions form large-9 medium-8 columns content">
    <?= $this->Form->create($disposition) ?>
    <fieldset>
        <legend><?= __('Add Disposition') ?></legend>
        <?php
            echo $this->Form->input('question');
            echo $this->Form->input('answer');
            echo $this->Form->input('active');
            echo $this->Form->input('letter_id', ['options' => $letters]);
            echo $this->Form->input('fromhierarchy');
            echo $this->Form->input('tohierarchy');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
