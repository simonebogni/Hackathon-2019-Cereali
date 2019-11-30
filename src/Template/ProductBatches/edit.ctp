<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch $productBatch
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
                    <?= $this->Form->create($productBatch) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
        <legend><?= __('Edit Product Batch') ?></legend>
        <div class="form-group">
            <?=  $this->Form->control('quantity_sale_goal',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?=  $this->Form->control('quantity_sale_effective',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?=  $this->Form->control('quantity_online_sale_goal',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?=  $this->Form->control('quantity_online_sale_effective',['class'=>'form-control']);?>
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
            <?=  $this->Form->control('phytosanitary_information',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?=  $this->Form->control('packaging_provision',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?=  $this->Form->control('base_unit_price',['class'=>'form-control']);?>
            </div>
            <div class="form-group">
            <?=  $this->Form->control('average_unit_price',['class'=>'form-control']);?>
            </div>
             <div class="form-group">
                                        <div class="row">
                                            <div class="col-2"><label>Creation date</label></div>
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
            <?=  $this->Form->control('product_id', ['options' => $products,'class'=>'form-control']); ?>
            </div>
           
            
       
     </fieldset>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-4">
                                <?= $this->Form->button(__('Submit'), ["class"=>"btn btn-primary btn-block"]) ?>
                            </div>
                            <div class="col-4 offset-4">
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $productBatch->id],
                                    ['confirm' => __('Are you sure you want to delete the report #{0}?', $productBatch->id), "class" => "btn btn-danger btn-block"]
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
