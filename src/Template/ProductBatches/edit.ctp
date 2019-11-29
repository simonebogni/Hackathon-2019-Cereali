<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch $productBatch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productBatch->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productBatch->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Batches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Batch Partitions'), ['controller' => 'ProductBatchPartitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Batch Partition'), ['controller' => 'ProductBatchPartitions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBatches form large-9 medium-8 columns content">
    <?= $this->Form->create($productBatch) ?>
    <fieldset>
        <legend><?= __('Edit Product Batch') ?></legend>
        <?php
            echo $this->Form->control('quantity_sale_goal');
            echo $this->Form->control('quantity_sale_effective');
            echo $this->Form->control('quantity_online_sale_goal');
            echo $this->Form->control('quantity_online_sale_effective');
            echo $this->Form->control('ordinary_reference_date');
            echo $this->Form->control('production_date');
            echo $this->Form->control('expiry_date');
            echo $this->Form->control('phytosanitary_information');
            echo $this->Form->control('packaging_provision');
            echo $this->Form->control('base_unit_price');
            echo $this->Form->control('average_unit_price');
            echo $this->Form->control('creation_date');
            echo $this->Form->control('closed_date', ['empty' => true]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('assigner_id');
            echo $this->Form->control('assignee_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
