<?php
include 'user.php';

$all = new User();
$data = $all->getAll();

echo json_encode($all);


?>