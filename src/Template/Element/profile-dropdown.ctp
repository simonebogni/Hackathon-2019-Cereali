<?php 
    $loggedUser = $this->getRequest()->getSession()->read("Auth.User");
?>
<div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
 
          <!-- user login dropdown start-->
          <?php 
           $loggedUseremail =  $loggedUser["email"];
           $loggedUserId = $loggedUser["id"];
           $myProfileUrl = "/users/view/".$loggedUserId;
          ?>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="/img/kek.png" width="40" height="40">
                            </span>
                            <span class="username"><?= $loggedUseremail ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href=<?= $myProfileUrl ?>><i class="icon_profile"></i> My Profile</a>
              </li>
             
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>