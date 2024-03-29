<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch[]|\Cake\Collection\CollectionInterface $productBatches
 */
$completedProductBatches = array();
$openProductBatches = array();
foreach($productBatches as $productBatch){
    if($productBatch->closed_date == null || $productBatch->closed_date == ""){
        array_push($openProductBatches, $productBatch);
    } else {
        array_push($completedProductBatches, $productBatch);
    }
}
$loggedUser = $this->getRequest()->getSession()->read("Auth.User");
$loggedUserRoleId = $loggedUser["role_id"];
$loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?= $this->element("sidebar");?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <h3><?= __('Completed Product Batches') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_sale_goal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Quantity effectively sold') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_online_sale_goal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Quantity effectively sold online') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('ordinary_reference_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('production_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('base_unit_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('average_unit_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('closed_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                                <?php
                                if($loggedUserRoleLetter=="D"){
                                    ?>
                                    <th scope="col"><?= $this->Paginator->sort('assigner_id') ?></th>
                                    <?php
                                } elseif($loggedUserRoleLetter=="G"){
                                    ?>
                                    <th scope="col"><?= $this->Paginator->sort('assignee_id') ?></th>
                                    <?php
                                }
                                ?>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($completedProductBatches as $productBatch): ?>
                            <tr>
                                <td><?= $this->Number->format($productBatch->id) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_sale_goal) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_sale_effective) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_online_sale_goal) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_online_sale_effective) ?></td>
                                <td><?= h($productBatch->ordinary_reference_date===null?"":$productBatch->ordinary_reference_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->production_date===null?"":$productBatch->production_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->expiry_date===null?"":$productBatch->expiry_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= $this->Number->currency($productBatch->base_unit_price) ?></td>
                                <td><?= $this->Number->currency($productBatch->average_unit_price) ?></td>
                                <td><?= h($productBatch->creation_date===null?"":$productBatch->creation_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->closed_date===null?"":$productBatch->closed_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= $productBatch->has('product') ? $this->Html->link($productBatch->product->name, ['controller' => 'Products', 'action' => 'view', $productBatch->product->id]) : '' ?></td>
                                <?php
                                if($loggedUserRoleLetter=="D"){
                                    ?>
                                    <td><?= $productBatch->has('assigner') ? $this->Html->link($productBatch->assigner->email, ['controller' => 'Users', 'action' => 'view', $productBatch->assigner->id]) : "" ?></td>
                                    <?php
                                } elseif($loggedUserRoleLetter=="G"){
                                    ?>
                                    <td><?= $productBatch->has('assignee') ? $this->Html->link($productBatch->assignee->email, ['controller' => 'Users', 'action' => 'view', $productBatch->assignee->id]) : '' ?></td>
                                    <?php
                                }
                                ?>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBatch->id], ["class" =>"btn btn-primary btn-sm"]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBatch->id], ["class" =>"btn btn-warning btn-sm"]) ?>
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
            <div class="row">
                <div class="col">
                    <h3><?= __('Open Product Batches') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_sale_goal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Quantity effectively sold') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_online_sale_goal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Quantity effectively sold online') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('ordinary_reference_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('production_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('base_unit_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('average_unit_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('closed_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                                <?php
                                if($loggedUserRoleLetter=="D"){
                                    ?>
                                    <th scope="col"><?= $this->Paginator->sort('assigner_id') ?></th>
                                    <?php
                                } elseif($loggedUserRoleLetter=="G"){
                                    ?>
                                    <th scope="col"><?= $this->Paginator->sort('assignee_id') ?></th>
                                    <?php
                                }
                                ?>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($openProductBatches as $productBatch): ?>
                            <tr>
                                <td><?= $this->Number->format($productBatch->id) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_sale_goal) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_sale_effective) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_online_sale_goal) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_online_sale_effective) ?></td>
                                <td><?= h($productBatch->ordinary_reference_date===null?"":$productBatch->ordinary_reference_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->production_date===null?"":$productBatch->production_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->expiry_date===null?"":$productBatch->expiry_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= $this->Number->currency($productBatch->base_unit_price) ?></td>
                                <td><?= $this->Number->currency($productBatch->average_unit_price) ?></td>
                                <td><?= h($productBatch->creation_date===null?"":$productBatch->creation_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->closed_date===null?"":$productBatch->closed_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= $productBatch->has('product') ? $this->Html->link($productBatch->product->name, ['controller' => 'Products', 'action' => 'view', $productBatch->product->id]) : '' ?></td>
                                <?php
                                if($loggedUserRoleLetter=="D"){
                                    ?>
                                    <td><?= $productBatch->has('assigner') ? $this->Html->link($productBatch->assigner->email, ['controller' => 'Users', 'action' => 'view', $productBatch->assigner->id]) : "" ?></td>
                                    <?php
                                } elseif($loggedUserRoleLetter=="G"){
                                    ?>
                                    <td><?= $productBatch->has('assignee') ? $this->Html->link($productBatch->assignee->email, ['controller' => 'Users', 'action' => 'view', $productBatch->assignee->id]) : '' ?></td>
                                    <?php
                                }
                                ?>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBatch->id], ["class" =>"btn btn-primary btn-sm"]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBatch->id], ["class" =>"btn btn-warning btn-sm"]) ?>
                                    <?= $loggedUserRoleLetter=="D" ? $this->Html->link(__('Add partition'), ['controller'=>'ProductBatchPartitions', 'action' => 'add', $productBatch->id], ["class" =>"btn btn-success btn-sm"]) : "" ?>
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
            <div class="row">
                <div class="col">
                    <h3><?= __('All Product Batches') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_sale_goal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Quantity effectively sold') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_online_sale_goal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Quantity effectively sold online') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('ordinary_reference_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('production_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('base_unit_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('average_unit_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('closed_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                                <?php
                                if($loggedUserRoleLetter=="D"){
                                    ?>
                                    <th scope="col"><?= $this->Paginator->sort('assigner_id') ?></th>
                                    <?php
                                } elseif($loggedUserRoleLetter=="G"){
                                    ?>
                                    <th scope="col"><?= $this->Paginator->sort('assignee_id') ?></th>
                                    <?php
                                }
                                ?>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productBatches as $productBatch): ?>
                            <tr>
                                <td><?= $this->Number->format($productBatch->id) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_sale_goal) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_sale_effective) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_online_sale_goal) ?></td>
                                <td><?= $this->Number->format($productBatch->quantity_online_sale_effective) ?></td>
                                <td><?= h($productBatch->ordinary_reference_date===null?"":$productBatch->ordinary_reference_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->production_date===null?"":$productBatch->production_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->expiry_date===null?"":$productBatch->expiry_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= $this->Number->currency($productBatch->base_unit_price) ?></td>
                                <td><?= $this->Number->currency($productBatch->average_unit_price) ?></td>
                                <td><?= h($productBatch->creation_date===null?"":$productBatch->creation_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($productBatch->closed_date===null?"":$productBatch->closed_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= $productBatch->has('product') ? $this->Html->link($productBatch->product->name, ['controller' => 'Products', 'action' => 'view', $productBatch->product->id]) : '' ?></td>
                                <?php
                                if($loggedUserRoleLetter=="D"){
                                    ?>
                                    <td><?= $productBatch->has('assigner') ? $this->Html->link($productBatch->assigner->email, ['controller' => 'Users', 'action' => 'view', $productBatch->assigner->id]) : "" ?></td>
                                    <?php
                                } elseif($loggedUserRoleLetter=="G"){
                                    ?>
                                    <td><?= $productBatch->has('assignee') ? $this->Html->link($productBatch->assignee->email, ['controller' => 'Users', 'action' => 'view', $productBatch->assignee->id]) : '' ?></td>
                                    <?php
                                }
                                ?>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBatch->id], ["class" =>"btn btn-primary btn-sm"]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBatch->id], ["class" =>"btn btn-warning btn-sm"]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-5">
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
