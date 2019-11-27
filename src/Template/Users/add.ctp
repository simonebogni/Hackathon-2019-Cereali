<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */ 
    $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
    $loggedUserId = $loggedUser["id"];
    $loggedUserRoleLetter = substr($loggedUser["role_id"], 0, 1);
    $entityToBeAdded = $loggedUserRoleLetter == "G" ? "Division Manager" : ($loggedUserRoleLetter == "D" ? "Seller" : "User");
    
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
                                    <legend><?= __('Add '.$entityToBeAdded) ?></legend>
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
                                        <label for="role_id">Role</label>
                                        <select class="form-control" id="role_id">
                                            <?php
                                            switch(substr($loggedUser["role_id"], 0, 1)){
                                                case "G":
                                                    foreach($roles as $role){
                                                        if($role["role_type_id"] == "D" && $role["department_id"] == substr($loggedUser["role_id"], 1, 1)){
                                                            ?>
                                                            <option value="<?= $role["id"]?>"><?= $role["name"]?></option>
                                                            <?php
                                                        }
                                                    }
                                                    break;
                                                case "D":
                                                    foreach($roles as $role){
                                                        if($role["role_type_id"] == "S" && $role["product_area_id"] == substr($loggedUser["role_id"], 2, 1) && $role["department_id"] == substr($loggedUser["role_id"], 1, 1)){
                                                            ?>
                                                            <option value="<?= $role->id?>"><?= $role->name?></option>
                                                            <?php
                                                        }
                                                    }
                                                    break;
                                                default:
                                                    ?>
                                                    <option value=""></option>
                                                    <?php
                                                    break;
                                            }
                                            ?>
                                        </select>
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


