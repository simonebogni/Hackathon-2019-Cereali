<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition $productBatchPartition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productBatchPartition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productBatchPartition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Batch Partitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Batches'), ['controller' => 'ProductBatches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Batch'), ['controller' => 'ProductBatches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBatchPartitions form large-9 medium-8 columns content">
    <?= $this->Form->create($productBatchPartition) ?>
    <fieldset>
        <legend><?= __('Edit Product Batch Partition') ?></legend>
        <?php
            echo $this->Form->control('quantity_sale_goal');
            echo $this->Form->control('advised_sale_price');
            echo $this->Form->control('focus_sale');
            echo $this->Form->control('extraordinary_loss_value');
            echo $this->Form->control('extraordinary_loss_type');
            echo $this->Form->control('creation_date');
            echo $this->Form->control('closed_date', ['empty' => true]);
            echo $this->Form->control('product_batch_id', ['options' => $productBatches]);
            echo $this->Form->control('assigner_id');
            echo $this->Form->control('assignee_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
