<?php
/**
 * @var \App\View\AppView $this
 */

$loggedUser = $this->getRequest()->getSession()->read("Auth.User");
switch(substr($loggedUser["role_id"], 0, 1)){
  case "G":
      echo $this->element("sidebar-general-director");
      break;
  case "D":
      echo $this->element("sidebar-division-director");
      break;
  case "S":
      echo $this->element("sidebar-seller");
      break;
  default:
      break;
}
?>
