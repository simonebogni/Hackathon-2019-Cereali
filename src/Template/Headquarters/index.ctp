<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Headquarters[]|\Cake\Collection\CollectionInterface $headquarters
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
<div class="headquarters index large-9 medium-8 columns content">
    <h3><?= __('Headquarters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_hours') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_legal') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($headquarters as $headquarter): ?>
            <tr>
                <td><?= $this->Number->format($headquarter->id) ?></td>
                <td><?= $this->Number->format($headquarter->max_hours) ?></td>
                <td><?= h($headquarter->is_legal) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('QR Code - IN'), ['controller' => 'headquarters', 'action' => 'generateQRCode', 'id' => $headquarter->id, 'type' => 'IN']); ?>
                    <?= $this->Html->link(__('QR Code - OUT'), ['controller' => 'headquarters', 'action' => 'generateQRCode', 'id' => $headquarter->id, 'type' => 'OUT']); ?>
                    <?= $this->Html->link(__('View'), ['controller' => 'headquarters', 'action' => 'view', $headquarter->id]); ?>
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
