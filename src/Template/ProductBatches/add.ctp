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
            <?= $this->element('sidebar');?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <?= $this->Form->create($productBatch) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend><?= __('Add Product Batch') ?></legend>
                                    <div class="form-group">
                                        <?= $this->Form->control('quantity_sale_goal', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('quantity_online_sale_goal', ['class'=>'form-control']);?>
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
                                        <?= $this->Form->control('phytosanitary_information', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('packaging_provision', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('base_unit_price', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <label for="assignee_id">Product</label>
                                        <select class="form-control" id="product_id" name="product_id">
                                            <?php
                                                $optGroup = null;
                                                foreach($products as $product){
                                                    if($product->product_area->name != $optGroup){
                                                        if($optGroup !== null){
                                                            //chiudi optgroup
                                                            ?></optgroup><?php
                                                        }
                                                        //apri il nuovo optgroup
                                                        ?><optgroup label="Area <?=$product->product_area->id?> - <?=$product->product_area->name?>"><?php
                                                        $optGroup = $product->product_area->name;
                                                    }
                                                    ?><option value="<?=$product->id?>"><?=$product->name?></option><?php
                                                }
                                                //chiudi l'ultimo optgroup
                                            ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="assignee_id">Assignee</label>
                                        <select class="form-control" id="assignee_id" name="assignee_id">
                                            <?php
                                                foreach($users as $user){
                                                    ?><option value="<?=$user->id?>"><?=$user->email?> - <?=$user->role->name?></option><?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <?= $this->Form->hidden('assigner_id', ['class'=>'form-control', 'value'=>$loggedUserId]);?>
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
