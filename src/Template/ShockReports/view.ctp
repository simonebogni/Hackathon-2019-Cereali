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
            <div class="row">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
