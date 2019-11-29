<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?= $this->element("sidebar");?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <h3>User #<?= h($user->id) ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('City') ?></th>
                            <td><?= h($user->city) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Role') ?></th>
                            <td><?= h($user->role->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Role id') ?></th>
                            <td><?= h($user->role->id) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="">
                
                
            </div>
        </div>
    </div>
</div>
