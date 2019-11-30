<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductArea $productArea
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
                    <?= $this->Form->create($productArea) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
        <legend><?= __('Edit Product Area') ?></legend>
         <div class="form-group">
         <?=   echo $this->Form->control('name');?>
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
                                    ['action' => 'delete', $productArea->id],
                                    ['confirm' => __('Are you sure you want to delete the report #{0}?', $productArea->id), "class" => "btn btn-danger btn-block"]
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
