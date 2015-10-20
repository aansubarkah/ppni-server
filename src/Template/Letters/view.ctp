<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Letter'), ['action' => 'edit', $letter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Letter'), ['action' => 'delete', $letter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $letter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Letters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Letter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Senders'), ['controller' => 'Senders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sender'), ['controller' => 'Senders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vias'), ['controller' => 'Vias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Via'), ['controller' => 'Vias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dispositions'), ['controller' => 'Dispositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disposition'), ['controller' => 'Dispositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evidences'), ['controller' => 'Evidences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidence'), ['controller' => 'Evidences', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="letters view large-9 medium-8 columns content">
    <h3><?= h($letter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $letter->has('user') ? $this->Html->link($letter->user->id, ['controller' => 'Users', 'action' => 'view', $letter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Sender') ?></th>
            <td><?= $letter->has('sender') ? $this->Html->link($letter->sender->name, ['controller' => 'Senders', 'action' => 'view', $letter->sender->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Via') ?></th>
            <td><?= $letter->has('via') ? $this->Html->link($letter->via->name, ['controller' => 'Vias', 'action' => 'view', $letter->via->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Number') ?></th>
            <td><?= h($letter->number) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($letter->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($letter->date) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($letter->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($letter->modified) ?></tr>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $letter->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($letter->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Dispositions') ?></h4>
        <?php if (!empty($letter->dispositions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Question') ?></th>
                <th><?= __('Answer') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Letter Id') ?></th>
                <th><?= __('Fromhierarchy') ?></th>
                <th><?= __('Tohierarchy') ?></th>
                <th><?= __('Content') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($letter->dispositions as $dispositions): ?>
            <tr>
                <td><?= h($dispositions->id) ?></td>
                <td><?= h($dispositions->question) ?></td>
                <td><?= h($dispositions->answer) ?></td>
                <td><?= h($dispositions->active) ?></td>
                <td><?= h($dispositions->letter_id) ?></td>
                <td><?= h($dispositions->fromhierarchy) ?></td>
                <td><?= h($dispositions->tohierarchy) ?></td>
                <td><?= h($dispositions->content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Dispositions', 'action' => 'view', $dispositions->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Dispositions', 'action' => 'edit', $dispositions->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dispositions', 'action' => 'delete', $dispositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dispositions->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Evidences') ?></h4>
        <?php if (!empty($letter->evidences)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Letter Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($letter->evidences as $evidences): ?>
            <tr>
                <td><?= h($evidences->id) ?></td>
                <td><?= h($evidences->user_id) ?></td>
                <td><?= h($evidences->letter_id) ?></td>
                <td><?= h($evidences->name) ?></td>
                <td><?= h($evidences->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Evidences', 'action' => 'view', $evidences->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Evidences', 'action' => 'edit', $evidences->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Evidences', 'action' => 'delete', $evidences->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidences->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
