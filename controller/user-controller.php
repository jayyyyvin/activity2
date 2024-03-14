<?php

include '../database/db.php';

class UserController extends Database
{
    
    public function search($search)
    {
        $this->init();
        if(empty($search['gender']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'please put gender information first'
            ]);
        }

        $gender = $search['gender'] ?? '';
        $data = $this->conn->query("SELECT * FROM user WHERE gender LIKE '%$gender%'");

        if($data)
        {
            $result = $data->fetch_assoc();
            return $result;
        } else {
            return json_encode([
                'message' => 'error'
            ]);
        }
    }

}

?>