<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBatch $productBatch
 */



$loggedUser = $this->getRequest()->getSession()->read("Auth.User");
$loggedUserId = $loggedUser["id"];
$loggedUserRoleId = $loggedUser["role_id"];
$loggedUserRoleLetter = substr($loggedUserRoleId, 0, 1);
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
                                    <?php 
                                    if($loggedUserRoleLetter == "G"){
                                    ?>
                                    <div class="form-group">
                                        <?=  $this->Form->control('quantity_sale_goal',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?=  $this->Form->control('quantity_online_sale_goal',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-2"><label>Ordinary reference date</label></div>
                                            <div class="col-2"><?= $this->Form->year('ordinary_reference_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->month('ordinary_reference_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->day('ordinary_reference_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->hour('ordinary_reference_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->minute('ordinary_reference_date', ['empty'=>false, 'class'=>'form-control']);?></div>
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
                                            <div class="col-2"><label>Expiry date</label></div>
                                            <div class="col-2"><?= $this->Form->year('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->month('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->day('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->hour('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
                                            <div class="col-2"><?= $this->Form->minute('expiry_date', ['empty'=>false, 'class'=>'form-control']);?></div>
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
                                    <?php
                                    } elseif($loggedUserRoleLetter == "D"){
                                    ?>
                                    <div class="form-group">
                                        <?=  $this->Form->control('Quantity effectively sold',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?=  $this->Form->control('Quantity effectively sold online',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?=  $this->Form->control('phytosanitary_information',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?=  $this->Form->control('packaging_provision',['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?=  $this->Form->control('average_unit_price',['class'=>'form-control']);?>
                                    </div>
                                    <?php
                                    }
                                    ?>
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
