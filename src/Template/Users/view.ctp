<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
</div>
