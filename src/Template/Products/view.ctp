<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Area') ?></th>
            <td><?= $product->has('product_area') ? $this->Html->link($product->product_area->name, ['controller' => 'ProductAreas', 'action' => 'view', $product->product_area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Batches') ?></h4>
        <?php if (!empty($product->product_batches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Quantity Sale Goal') ?></th>
                <th scope="col"><?= __('Quantity Online Sale Goal') ?></th>
                <th scope="col"><?= __('Ordinary Reference Date') ?></th>
                <th scope="col"><?= __('Production Date') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Phytosanitary Information') ?></th>
                <th scope="col"><?= __('Packaging Provision') ?></th>
                <th scope="col"><?= __('Base Unit Price') ?></th>
                <th scope="col"><?= __('Creation Date') ?></th>
                <th scope="col"><?= __('Closed Date') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Assigner Id') ?></th>
                <th scope="col"><?= __('Assignee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_batches as $productBatches): ?>
            <tr>
                <td><?= h($productBatches->id) ?></td>
                <td><?= h($productBatches->quantity_sale_goal) ?></td>
                <td><?= h($productBatches->quantity_online_sale_goal) ?></td>
                <td><?= h($productBatches->ordinary_reference_date) ?></td>
                <td><?= h($productBatches->production_date) ?></td>
                <td><?= h($productBatches->expiry_date) ?></td>
                <td><?= h($productBatches->phytosanitary_information) ?></td>
                <td><?= h($productBatches->packaging_provision) ?></td>
                <td><?= h($productBatches->base_unit_price) ?></td>
                <td><?= h($productBatches->creation_date) ?></td>
                <td><?= h($productBatches->closed_date) ?></td>
                <td><?= h($productBatches->product_id) ?></td>
                <td><?= h($productBatches->assigner_id) ?></td>
                <td><?= h($productBatches->assignee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductBatches', 'action' => 'view', $productBatches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductBatches', 'action' => 'edit', $productBatches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductBatches', 'action' => 'delete', $productBatches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBatches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
