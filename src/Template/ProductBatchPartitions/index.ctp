<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition[]|\Cake\Collection\CollectionInterface $productBatchPartitions
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
                    <h3><?= __('Product Batches') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
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
                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
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
</div>