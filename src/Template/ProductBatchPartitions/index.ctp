<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition[]|\Cake\Collection\CollectionInterface $productBatchPartitions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Batch Partition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Batches'), ['controller' => 'ProductBatches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Batch'), ['controller' => 'ProductBatches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBatchPartitions index large-9 medium-8 columns content">
    <h3><?= __('Product Batch Partitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_sale_goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_sale_effective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('advised_sale_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effective_sale_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('focus_sale') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extraordinary_loss_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extraordinary_loss_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closed_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_batch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assignee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productBatchPartitions as $productBatchPartition): ?>
            <tr>
                <td><?= $this->Number->format($productBatchPartition->id) ?></td>
                <td><?= $this->Number->format($productBatchPartition->quantity_sale_goal) ?></td>
                <td><?= $this->Number->format($productBatchPartition->quantity_sale_effective) ?></td>
                <td><?= $this->Number->format($productBatchPartition->advised_sale_price) ?></td>
                <td><?= $this->Number->format($productBatchPartition->effective_sale_price) ?></td>
                <td><?= h($productBatchPartition->focus_sale) ?></td>
                <td><?= $this->Number->format($productBatchPartition->extraordinary_loss_value) ?></td>
                <td><?= h($productBatchPartition->extraordinary_loss_type) ?></td>
                <td><?= h($productBatchPartition->creation_date) ?></td>
                <td><?= h($productBatchPartition->closed_date) ?></td>
                <td><?= $productBatchPartition->has('product_batch') ? $this->Html->link($productBatchPartition->product_batch->id, ['controller' => 'ProductBatches', 'action' => 'view', $productBatchPartition->product_batch->id]) : '' ?></td>
                <td><?= $this->Number->format($productBatchPartition->assigner_id) ?></td>
                <td><?= $productBatchPartition->has('user') ? $this->Html->link($productBatchPartition->user->id, ['controller' => 'Users', 'action' => 'view', $productBatchPartition->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBatchPartition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBatchPartition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productBatchPartition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBatchPartition->id)]) ?>
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
