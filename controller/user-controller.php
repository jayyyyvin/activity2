<?php

include '../database/db.php';

class UserController extends Database
{
    public function insert($params){

        if($_SERVER['REQUEST_METHOD'] != 'POST'){
         return json_encode([
        'code'=> 'POST METHOD IS REQUIRED',
    ]);
     }
         if(!isset($params['fname']) || empty($params['fname'])){
             return json_encode([
                 'code'=> 'First Name is required',
             ]);
         }
         if(!isset($params['lname']) || empty($params['lname'])){
             return json_encode([
                 'code'=> 'Last Name is required',
             ]);
         }
         if(!isset($params['gender']) || empty($params['gender'])){
             return json_encode([
                 'code'=> 'Gender is required',
             ]);
         }
         if(!isset($params['age']) || empty($params['age'])){
             return json_encode([
                 'code'=> 'Age is required',
             ]);
         }
         $fname = $params['fname'];
         $lname = $params['lname'];
         $gender = $params['gender'];
         $age = $params['age'];
 
         
        $sql = $this->conn->query("INSERT INTO user(fname, lname, gender, age) 
         VALUES('$fname','$lname','$gender','$age')");
 
 
         if($sql){
             return json_encode([
                 'code' => 200,
                 'message' => 'The user successfully added', 
             ]);
         }else {
             return json_encode([
                 'code' => 500,
                 'message' => $this->conn->getError(), 
             ]);
 
             
         }
     }
 
    
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