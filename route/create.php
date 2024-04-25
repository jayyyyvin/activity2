<?php

include '../controller/user-controller.php';

$create = new UserController();
echo $create->insert($_POST);
?>