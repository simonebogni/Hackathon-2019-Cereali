<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatchPartition $productBatchPartition
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
            <?= $this->Form->control('quantity_sale_goal',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?= $this->Form->control('quantity_sale_effective',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?= $this->Form->control('advised_sale_price',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?= $this->Form->control('effective_sale_price',['class'=>'form-control']);?>
            </div>
            <div class="form-check">
            <?= $this->Form->control('focus_sale',['class'=>'form-check']);?>
            </div>
            <div class="form-group">
            <?= $this->Form->control('extraordinary_loss_value',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?= $this->Form->control('extraordinary_loss_type',['class'=>'form-control']);?>
            </div>

             <div class="form-group">
                                        <div class="row">
                                            <div class="col-2"><label>Expiry date</label></div>
                                            <div class="col-2"><?= $this->Form->year('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->month('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->day('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->hour('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->minute('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                        </div>
           <div class="form-group">
                                        <div class="row">
                                            <div class="col-2"><label>Expiry date</label></div>
                                            <div class="col-2"><?= $this->Form->year('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->month('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->day('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->hour('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->minute('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                        </div>
                                        <div class="form-group">
            <?= $this->Form->control('product_batch_id', ['options' => $productBatches, 'class'=>'form-control']);?>
            </div>
           
            <div class="form-group">
            <?= $this->Form->control('assignee_id', ['options' => $users ,'class'=>'form-control']);?>
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