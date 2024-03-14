<?php
include 'database/db.php';

class User extends Database 
{
    public function getAll()
    {
        $this->init();
        $data = $this->conn->query('SELECT * FROM user');
        $all = $data->fetch_all(MYSQLI_ASSOC);
        return $all;
    }
}

?>