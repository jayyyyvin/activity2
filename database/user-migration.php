<?php
include 'db.php';
class userMigration extends Database 
{
    public function createTable()
    {
        $this->init();
        $this->conn->query('CREATE TABLE IF NOT EXISTS user(
            id int primary key auto_increment,
            fname varchar(255) not null,
            lname varchar(255) not null,
            gender varchar(255) not null,
            age varchar(255) not null
            )');
    }
   
}
?>