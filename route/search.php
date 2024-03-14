<?php

include '../controller/user-controller.php';

$data = new UserController();
$search = $data->search($_GET);
echo json_encode($search);
?>