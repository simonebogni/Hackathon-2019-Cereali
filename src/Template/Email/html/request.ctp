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
            Request received. Accept clicking the follow link: </br>
            <?php
                $completeUrl = $url . $this->Url->build([
                    'controller' => 'requests',
                    'action' => 'accept',
                    '?' => ['company_id' => $company_id, 'accountant_id' => $accountant_id],
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
