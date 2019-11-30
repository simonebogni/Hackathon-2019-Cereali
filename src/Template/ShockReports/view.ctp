<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShockReport $shockReport
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
                    <h3>Report #<?= h($shockReport->id) ?></h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th scope="row"><?= __('Shock Type') ?></th>
                            <td><?= $shockReport->has('shock_type') ? $this->Html->link($shockReport->shock_type->name, ['controller' => 'ShockTypes', 'action' => 'view', $shockReport->shock_type->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Shock Type Other') ?></th>
                            <td><?= h($shockReport->shock_type_other) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('User') ?></th>
                            <td><?= $shockReport->has('user') ? $this->Html->link($shockReport->user->email, ['controller' => 'Users', 'action' => 'view', $shockReport->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Damage Amount') ?></th>
                            <td><?= $this->Number->currency($shockReport->damage_amount) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created Date') ?></th>
                            <td><?= h($shockReport->created_date===null?"":$shockReport->created_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Processed Date') ?></th>
                            <td><?= h($shockReport->processed_date===null?"":$shockReport->processed_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
