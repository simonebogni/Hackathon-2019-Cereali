<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Register $register
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!-- Login -->
        <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
    </ul>
</nav>
<div class="registers form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Sign up') ?></legend>
        <?php
            ?>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->select(
                'role',
                [
                    'S' => 'Seller',
                    'G' => 'General Director',
                    'D' => 'Division Director'
                ]
            );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
