<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch[]|\Cake\Collection\CollectionInterface $productBatches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Batch'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Batch Partitions'), ['controller' => 'ProductBatchPartitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Batch Partition'), ['controller' => 'ProductBatchPartitions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBatches index large-9 medium-8 columns content">
    <h3><?= __('Product Batches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_sale_goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_online_sale_goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordinary_reference_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('production_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('base_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closed_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assignee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productBatches as $productBatch): ?>
            <tr>
                <td><?= $this->Number->format($productBatch->id) ?></td>
                <td><?= $this->Number->format($productBatch->quantity_sale_goal) ?></td>
                <td><?= $this->Number->format($productBatch->quantity_online_sale_goal) ?></td>
                <td><?= h($productBatch->ordinary_reference_date) ?></td>
                <td><?= h($productBatch->production_date) ?></td>
                <td><?= h($productBatch->expiry_date) ?></td>
                <td><?= $this->Number->format($productBatch->base_unit_price) ?></td>
                <td><?= h($productBatch->creation_date) ?></td>
                <td><?= h($productBatch->closed_date) ?></td>
                <td><?= $productBatch->has('product') ? $this->Html->link($productBatch->product->name, ['controller' => 'Products', 'action' => 'view', $productBatch->product->id]) : '' ?></td>
                <td><?= $this->Number->format($productBatch->assigner_id) ?></td>
                <td><?= $productBatch->has('user') ? $this->Html->link($productBatch->user->id, ['controller' => 'Users', 'action' => 'view', $productBatch->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBatch->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBatch->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productBatch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBatch->id)]) ?>
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
