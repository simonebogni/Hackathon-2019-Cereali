<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShockReport $shockReport
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
                    <?= $this->Form->create($shockReport) ?>
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend><?= __('Edit Shock Report') ?></legend>
                                    <div class="form-group">
                                        <?= $this->Form->control('shock_type_id', ['options' => $shockTypes, 'empty' => true, 'class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('shock_type_other', ['class'=>'form-control']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->control('damage_amount', ['class'=>'form-control', 'step'=>'100.00']);?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->hidden('user_id', ["value"=>$loggedUserId]);?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <?= $this->Form->button(__('Submit'), ["class"=>"btn btn-primary btn-block"]) ?>
                            </div>
                            <div class="col-4 offset-4">
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $shockReport->id],
                                    ['confirm' => __('Are you sure you want to delete the report #{0}?', $shockReport->id), "class" => "btn btn-danger btn-block"]
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
