<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \App\Model\Entity\ProductArea[]|\Cake\Collection\CollectionInterface $productAreas
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
                    <?= $this->Form->create($product) ?>
                    <fieldset>
                        <legend><?= __('Add Product ') ?></legend>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <?php
                                    echo $this->Form->control('name', ["class"=>"form-control"]);
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="product_area_id">Product area</label>
                                    <select class="form-control" name="product_area_id" id="product_area_id">
                                        <?php foreach($productAreas as $productArea){
                                            ?>
                                            <option value="<?= $productArea->id ?>"><?= $productArea->name ?></option>
                                            <?php
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                            <div class="col col-md-4 offset-md-8">
                            <?= $this->Form->button(__('Submit'), ["class"=>"btn btn-primary btn-block"]) ?>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>