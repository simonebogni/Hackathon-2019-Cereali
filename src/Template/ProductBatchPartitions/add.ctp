<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition $productBatchPartition
 * @var \App\Model\Entity\ProductBatch $productBatch
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 * @var int $maxQuantity
 */


$loggedUser = $this->getRequest()->getSession()->read("Auth.User");
$loggedUserId = $loggedUser["id"]
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?= $this->element('sidebar');?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <?= $this->Form->create($productBatchPartition) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend><?= __('Add Product Batch Partition') ?></legend>
                                    <div class="form-group">
                                        <label for="quantity_sale_goal" >Quantity sale goal (from 1 to <?=$maxQuantity?>)</label>
                                        <input type="number" class="form-control" id="quantity_sale_goal" name="quantity_sale_goal" min="1" max="<?= $maxQuantity ?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('advised_sale_price',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-check">
                                        <?= $this->Form->control('focus_sale',['class'=>'form-check']);?>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_batch_id">Product batch</label>
                                        <input type="text" id="product_batch_id" name="product_batch_id" class="form-control" value="<?= $productBatch->id ?>" disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="assignee_id">Assignee</label>
                                        <select class="form-control" name="assignee_id" id="assignee_id">
                                            <?php foreach($users as $user){
                                                ?>
                                                <option value="<?= $user->id?>"><?= $user->email?> - <?= $user->city?></option>
                                                <?php
                                            }?>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-8">
                                <?= $this->Form->button(__('Submit'), ["class"=>"btn btn-primary btn-block"]) ?>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>