<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
    $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!-- Users actions -->
        <?php if($loggedUser["role"] === "G"){
            ?>
            <!-- Liste di utenti -->
            <li><?= $this->Html->link(__('List General Directors'), ['controller' => 'Users', 'action' => 'generalDirectors']) ?></li>
            <!-- Liste di azioni:
                Vedi form da altri direttori generali
                Manda form a direttori di divisione
                Vedi form dei casi di shock da venditori + generazione form riepilogativo
            -->
            <?php
        } else if($loggedUser["role"] === "D"){
            ?>
            <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Users', 'action' => 'sellers']) ?></li>
            <?php
        } else if($loggedUser["role"] === "S"){
            ?>
            <li><?= $this->Html->link(__('List Division Directors'), ['controller' => 'Users', 'action' => 'divisionDirectors']) ?></li>
        
            <?php
        }
        ?>
        <!-- Logout -->
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $users): ?>
            <tr>
                <td><?= h($users->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
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