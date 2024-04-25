<?php

include '../controller/user-controller.php';

$all = new UserController();
$alldata = $all->getAll();
echo json_encode($alldata);
?>