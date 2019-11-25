<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch $productBatch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Batch'), ['action' => 'edit', $productBatch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Batch'), ['action' => 'delete', $productBatch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBatch->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Batches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Batch'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Batch Partitions'), ['controller' => 'ProductBatchPartitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Batch Partition'), ['controller' => 'ProductBatchPartitions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productBatches view large-9 medium-8 columns content">
    <h3><?= h($productBatch->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productBatch->has('product') ? $this->Html->link($productBatch->product->name, ['controller' => 'Products', 'action' => 'view', $productBatch->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $productBatch->has('user') ? $this->Html->link($productBatch->user->id, ['controller' => 'Users', 'action' => 'view', $productBatch->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productBatch->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Sale Goal') ?></th>
            <td><?= $this->Number->format($productBatch->quantity_sale_goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Online Sale Goal') ?></th>
            <td><?= $this->Number->format($productBatch->quantity_online_sale_goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Base Unit Price') ?></th>
            <td><?= $this->Number->format($productBatch->base_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assigner Id') ?></th>
            <td><?= $this->Number->format($productBatch->assigner_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordinary Reference Date') ?></th>
            <td><?= h($productBatch->ordinary_reference_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Production Date') ?></th>
            <td><?= h($productBatch->production_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry Date') ?></th>
            <td><?= h($productBatch->expiry_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creation Date') ?></th>
            <td><?= h($productBatch->creation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closed Date') ?></th>
            <td><?= h($productBatch->closed_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Phytosanitary Information') ?></h4>
        <?= $this->Text->autoParagraph(h($productBatch->phytosanitary_information)); ?>
    </div>
    <div class="row">
        <h4><?= __('Packaging Provision') ?></h4>
        <?= $this->Text->autoParagraph(h($productBatch->packaging_provision)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Batch Partitions') ?></h4>
        <?php if (!empty($productBatch->product_batch_partitions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Quantity Sale Goal') ?></th>
                <th scope="col"><?= __('Advised Sale Price') ?></th>
                <th scope="col"><?= __('Focus Sale') ?></th>
                <th scope="col"><?= __('Extraordinary Loss Value') ?></th>
                <th scope="col"><?= __('Extraordinary Loss Type') ?></th>
                <th scope="col"><?= __('Creation Date') ?></th>
                <th scope="col"><?= __('Closed Date') ?></th>
                <th scope="col"><?= __('Product Batch Id') ?></th>
                <th scope="col"><?= __('Assigner Id') ?></th>
                <th scope="col"><?= __('Assignee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productBatch->product_batch_partitions as $productBatchPartitions): ?>
            <tr>
                <td><?= h($productBatchPartitions->id) ?></td>
                <td><?= h($productBatchPartitions->quantity_sale_goal) ?></td>
                <td><?= h($productBatchPartitions->advised_sale_price) ?></td>
                <td><?= h($productBatchPartitions->focus_sale) ?></td>
                <td><?= h($productBatchPartitions->extraordinary_loss_value) ?></td>
                <td><?= h($productBatchPartitions->extraordinary_loss_type) ?></td>
                <td><?= h($productBatchPartitions->creation_date) ?></td>
                <td><?= h($productBatchPartitions->closed_date) ?></td>
                <td><?= h($productBatchPartitions->product_batch_id) ?></td>
                <td><?= h($productBatchPartitions->assigner_id) ?></td>
                <td><?= h($productBatchPartitions->assignee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductBatchPartitions', 'action' => 'view', $productBatchPartitions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductBatchPartitions', 'action' => 'edit', $productBatchPartitions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductBatchPartitions', 'action' => 'delete', $productBatchPartitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBatchPartitions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
