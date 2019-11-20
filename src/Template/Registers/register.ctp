<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Register $register
 */
?>
<div class="container" id="register-container" >
    <div class="row justify-content-center">
        <div class="col col-md-8">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Sign up') ?></legend>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role">
                        <option value="S">Seller</option>
                        <option value="G">General Director</option>
                        <option value="D">Division Director</option>
                    </select>
                </div>
            </fieldset>
            <div class="row" align="">
                <div class="col-6 offset-6">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-8 col-md-offset-2 mt-3">
            <p>To login click here: <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></p>
        </div>
    </div>
</div>
