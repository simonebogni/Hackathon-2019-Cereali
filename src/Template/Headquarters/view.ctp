<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Headquarters $headquarters
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
<div class="headquarters view large-9 medium-8 columns content">
    <h3><?= h($headquarter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $headquarter->has('user') ? $this->Html->link($headquarter->user->id, ['controller' => 'Users', 'action' => 'view', $headquarter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($headquarter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Hours') ?></th>
            <td><?= $this->Number->format($headquarter->max_hours) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Legal') ?></th>
            <td><?= $headquarter->is_legal ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
