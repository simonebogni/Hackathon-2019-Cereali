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
            <?= $this->element("sidebar")?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <?= $this->Form->create($productBatchPartition) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
        <legend><?= __('Edit Product Batch Partition') ?></legend>
        
            <div class="form-group">
          <?=   $this->Form->control('quantity_sale_goal',['class'=>'form-control']);?>
          </div>
          <div class="form-group">
           <?=  $this->Form->control('quantity_sale_effective',['class'=>'form-control']);?>
           </div>
           <div class="form-group">
           <?=  $this->Form->control('advised_sale_price',['class'=>'form-control']);?>
           </div>
           <div class="form-group">
           <?=  $this->Form->control('effective_sale_price',['class'=>'form-control']);?>
           </div>
           <div class="form-group">
           <?=  $this->Form->control('focus_sale',['class'=>'form-check-input']);?>
           </div>
           <div class="form-group">
           <?=  $this->Form->control('extraordinary_loss_value',['class'=>'form-control']);?>
           </div>
           <div class="form-group">
           <?=  $this->Form->control('extraordinary_loss_type',['class'=>'form-control']);?>
           </div>
            
             <div class="form-group">
                                        <div class="row">
                                            <div class="col-2"><label>Production date</label></div>
                                            <div class="col-2"><?= $this->Form->year('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->month('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->day('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->hour('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->minute('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                        </div>
                                    </div>
            <div class="form-group">
                                        <div class="row">
                                            <div class="col-2"><label>Production date</label></div>
                                            <div class="col-2"><?= $this->Form->year('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->month('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->day('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->hour('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->minute('production_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
           <?=  $this->Form->control('product_batch_id', ['options' => $productBatches ,'class'=>'?>form-control']);?>
            </div>
            <div class="form-group">
           <?=  $this->Form->control('assigner_id',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
           <?=  $this->Form->control('assignee_id', ['options' => $users,'class'=>'form-control']);?>
            </div>
        
      </fieldset>
                            </div>
                        </div>
                        <div class="row  mb-5">
                            <div class="col-4">
                                <?= $this->Form->button(__('Submit'), ["class"=>"btn btn-primary btn-block"]) ?>
                            </div>
                            <div class="col-4 offset-4">
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $productBatchPartition->id],
                                    ['confirm' => __('Are you sure you want to delete the report #{0}?', $productBatchPartition->id), "class" => "btn btn-danger btn-block"]
                                    )
                                ?>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
