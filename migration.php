<?php
include 'database/user-migration.php';

$migration = new userMigration();
$migration->createTable();
?>