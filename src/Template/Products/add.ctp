<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Areas'), ['controller' => 'ProductAreas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Area'), ['controller' => 'ProductAreas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Batches'), ['controller' => 'ProductBatches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Batch'), ['controller' => 'ProductBatches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('product_area_id', ['options' => $productAreas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
