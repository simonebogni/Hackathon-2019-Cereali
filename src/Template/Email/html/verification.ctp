<!DOCTYPE html>
<html>

<header class="row">
    <div class="header-title">
        <h1>Verification </h1>
    </div>
</header>

<div class="row">
    <div class="columns large-12">
        <p>
            That's your verification link: </br>
            <?php
                $completeUrl = $url . $this->Url->build([
                    'controller' => 'registers',
                    'action' => 'validate',
                    '?' => ['email' => $email],
                ]);

                echo $this->Html->link(
                    'Confirm',         
                    $completeUrl, 
                    ['escape' => false]
                ); 
            ?>
        </p>
    </div>
</div>

</body>
</html>
