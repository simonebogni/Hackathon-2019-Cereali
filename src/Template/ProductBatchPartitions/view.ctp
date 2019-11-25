<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition $productBatchPartition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Batch Partition'), ['action' => 'edit', $productBatchPartition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Batch Partition'), ['action' => 'delete', $productBatchPartition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBatchPartition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Batch Partitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Batch Partition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Batches'), ['controller' => 'ProductBatches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Batch'), ['controller' => 'ProductBatches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productBatchPartitions view large-9 medium-8 columns content">
    <h3><?= h($productBatchPartition->id) ?></h3>
    <table class="vertical-table">
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
            <th scope="row"><?= __('Advised Sale Price') ?></th>
            <td><?= $this->Number->format($productBatchPartition->advised_sale_price) ?></td>
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
