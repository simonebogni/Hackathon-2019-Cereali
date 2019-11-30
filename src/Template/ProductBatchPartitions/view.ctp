<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition $productBatchPartition
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
                    <h3>Product Batch Partition #<?= h($productBatchPartition->id) ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
    <table class="table">
        <tr>
            <th scope="row"><?= __('Extraordinary Loss Type') ?></th>
            <td><?= h($productBatchPartition->extraordinary_loss_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Batch') ?></th>
            <td><?= $productBatchPartition->has('product_batch') ? $this->Html->link($productBatchPartition->product_batch->id, ['controller' => 'ProductBatches', 'action' => 'view', $productBatchPartition->product_batch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $productBatchPartition->has('user') ? $this->Html->link($productBatchPartition->user->id, ['controller' => 'Users', 'action' => 'view', $productBatchPartition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productBatchPartition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Sale Goal') ?></th>
            <td><?= $this->Number->format($productBatchPartition->quantity_sale_goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Sale Effective') ?></th>
            <td><?= $this->Number->format($productBatchPartition->quantity_sale_effective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Advised Sale Price') ?></th>
            <td><?= $this->Number->format($productBatchPartition->advised_sale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Effective Sale Price') ?></th>
            <td><?= $this->Number->format($productBatchPartition->effective_sale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extraordinary Loss Value') ?></th>
            <td><?= $this->Number->format($productBatchPartition->extraordinary_loss_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigner Id') ?></th>
            <td><?= $this->Number->format($productBatchPartition->assigner_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creation Date') ?></th>
            <td><?= h($productBatchPartition->creation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closed Date') ?></th>
            <td><?= h($productBatchPartition->closed_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Focus Sale') ?></th>
            <td><?= $productBatchPartition->focus_sale ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
 </div>
        </div>
    </div>
</div>
