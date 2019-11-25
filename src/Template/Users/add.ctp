<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */ $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
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
                    <?= $this->Form->create($user) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend><?= __('Add User') ?></legend>
                                    <div class="form-group">
                                        <?= $this->Form->control('email', ['class'=>'form-control']); ?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('password', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('city', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?=  $this->Form->control('role_id', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <!-- da fixxareeeeeeeeeeee-->
                                        <?= $this->Form->hidden('user_id', ["value"=>$loggedUserId]);?>
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


