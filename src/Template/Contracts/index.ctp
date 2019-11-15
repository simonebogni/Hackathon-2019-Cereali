<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract[]|\Cake\Collection\CollectionInterface $contracts
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
<div class="contracts index large-9 medium-8 columns content">
    <h3><?= __('Contracts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('accountant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $contract): ?>
            <tr>
                <td><?= $contract->has('accountant_id') ? $this->Html->link($contract->accountant_id, ['controller' => 'Users', 'action' => 'view', $contract->accountant_id]) : '' ?></td>
                <td><?= $contract->has('user') ? $this->Html->link($contract->user->id, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contract->accountant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->accountant_id)]) ?>
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
