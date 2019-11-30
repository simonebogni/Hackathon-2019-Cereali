<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch $productBatch
 */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?= $this->element('sidebar');?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <h3>Product batch #<?= h($productBatch->id) ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th scope="row"><?= __('Product') ?></th>
                            <td><?= $productBatch->has('product') ? $this->Html->link($productBatch->product->name, ['controller' => 'Products', 'action' => 'view', $productBatch->product->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('User') ?></th>
                            <td><?= $productBatch->has('user') ? $this->Html->link($productBatch->user->email, ['controller' => 'Users', 'action' => 'view', $productBatch->user->id]) : '' ?></td>
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
                            <th scope="row"><?= __('Quantity effectively sold') ?></th>
                            <td><?= $this->Number->format($productBatch->quantity_sale_effective) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Quantity Online Sale Goal') ?></th>
                            <td><?= $this->Number->format($productBatch->quantity_online_sale_goal) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Quantity effectively sold online') ?></th>
                            <td><?= $this->Number->format($productBatch->quantity_online_sale_effective) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Base Unit Price') ?></th>
                            <td><?= $this->Number->format($productBatch->base_unit_price) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Average Unit Price') ?></th>
                            <td><?= $this->Number->format($productBatch->average_unit_price) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Assigner Id') ?></th>
                            <td><?= $this->Number->format($productBatch->assigner_id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Ordinary Reference Date') ?></th>
                            <td><?= h($productBatch->ordinary_reference_date===null?"":$productBatch->ordinary_reference_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Production Date') ?></th>
                            <td><?= h($productBatch->production_date===null?"":$productBatch->production_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Expiry Date') ?></th>
                            <td><?= h($productBatch->expiry_date===null?"":$productBatch->expiry_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Creation Date') ?></th>
                            <td><?= h($productBatch->creation_date===null?"":$productBatch->creation_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Closed Date') ?></th>
                            <td><?= h($productBatch->closed_date===null?"":$productBatch->closed_date->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4><?= __('Phytosanitary Information') ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $this->Text->autoParagraph(h($productBatch->phytosanitary_information==null?"None given":$productBatch->phytosanitary_information)); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4><?= __('Packaging Provision') ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $this->Text->autoParagraph(h($productBatch->packaging_provision==null?"None given":$productBatch->packaging_provision)); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4><?= __('Related Product Batch Partitions') ?></h4>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                <?php if (!empty($productBatch->product_batch_partitions)){ ?>
                    <table class="table">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Quantity Sale Goal') ?></th>
                            <th scope="col"><?= __('Quantity effectively sold') ?></th>
                            <th scope="col"><?= __('Advised Sale Price') ?></th>
                            <th scope="col"><?= __('Effective Sale Price') ?></th>
                            <th scope="col"><?= __('Focus Sale') ?></th>
                            <th scope="col"><?= __('Extraordinary Loss Value') ?></th>
                            <th scope="col"><?= __('Extraordinary Loss Type') ?></th>
                            <th scope="col"><?= __('Creation Date') ?></th>
                            <th scope="col"><?= __('Closed Date') ?></th>
                            <th scope="col"><?= __('Product Batch Id') ?></th>
                            <th scope="col"><?= __('Assignee Id') ?></th>
                            
                        </tr>
                        <?php foreach ($productBatch->product_batch_partitions as $productBatchPartitions): ?>
                        <tr>
                            <td><?= h($productBatchPartitions->id) ?></td>
                            <td><?= h($productBatchPartitions->quantity_sale_goal) ?></td>
                            <td><?= h($productBatchPartitions->quantity_sale_effective) ?></td>
                            <td><?= h($productBatchPartitions->advised_sale_price) ?></td>
                            <td><?= h($productBatchPartitions->effective_sale_price) ?></td>
                            <td><?= h($productBatchPartitions->focus_sale ? __('Yes') : __('No')) ?></td>
                            <td><?= h($productBatchPartitions->extraordinary_loss_value) ?></td>
                            <td><?= h($productBatchPartitions->extraordinary_loss_type) ?></td>
                            <td><?= h($productBatchPartitions->creation_date===null?"":$productBatchPartitions->creation_date->format('Y-m-d H:i:s')) ?></td>
                            <td><?= h($productBatchPartitions->closed_date===null?"":$productBatchPartitions->closed_date->format('Y-m-d H:i:s')) ?></td>
                            <td><?= h($productBatchPartitions->product_batch_id) ?></td>
                            <td><?= h($productBatchPartitions->assignee_id) ?></td>
                           
                        </tr>
                        <?php endforeach; ?>
                    </table>
                        <?php } else { echo h("None found.");} ?>
                </div>
            </div>
        </div>
    </div>
</div>
