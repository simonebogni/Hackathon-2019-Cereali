<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
    $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
?>
<div class="container-fluid"></div>
    <div class="row">
        <div class="col-md-4">
        <?php
        switch($loggedUser["role"]){
            case "G":
                echo $this->element("sidebar-general-director");
                break;
            case "D":
                echo $this->element("sidebar-division-director");
                break;
            case "S":
                echo $this->element("sidebar-seller");
                break;
            default:
                break;
        }
        ?>
        </div>
        <div class="col-md-8">
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
        </div>
    </div>
</div>
