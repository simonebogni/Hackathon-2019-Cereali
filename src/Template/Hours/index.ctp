<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour[]|\Cake\Collection\CollectionInterface $hours
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!-- Users actions -->
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Users', 'action' => 'companies']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Users', 'action' => 'employees']) ?></li>
        <li><?= $this->Html->link(__('List Accountants'), ['controller' => 'Users', 'action' => 'accountants']) ?></li>
        <!-- Headquarters -->
        <li><?= $this->Html->link(__('List Headquarters'), ['controller' => 'Headquarters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add Headquarter'), ['controller' => 'Headquarters', 'action' => 'add']) ?></li>
        <!-- Contracts -->
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <!-- Hours -->
        <li><?= $this->Html->link(__('List Hours'), ['controller' => 'Hours', 'action' => 'index']) ?></li>
        <!-- Logout -->
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="hours index large-9 medium-8 columns content">
    <h3><?= __('Hours') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('headquarter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('go_in') ?></th>
                <th scope="col"><?= $this->Paginator->sort('go_out') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hours as $hour): ?>
            <tr>
                <td><?= $hour->has('user') ? $this->Html->link($hour->user->id, ['controller' => 'Users', 'action' => 'view', $hour->user->id]) : '' ?></td>
                <td><?= $hour->has('headquarters') ? $this->Html->link($hour->headquarters->id, ['controller' => 'Headquarters', 'action' => 'view', $hour->headquarters->id]) : '' ?></td>
                <td><?= h($hour->go_in) ?></td>
                <td><?= h($hour->go_out) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hour->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hour->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
