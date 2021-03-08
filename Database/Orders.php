<?php

//Use to fetch producr data
class Orders
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con))return null;
        $this->db = $db;
    }

    public  function insertOrderDetail($user_id, $username, $address){
        if ($this->db->con != null){
            if ($user_id!= null){

                $query_string = sprintf("INSERT INTO orders(`user_id`,username,`address`) VALUES('%s','%s','%s')", $user_id, $username, $address);

                // execute query
                $result = $this->db->con->query($query_string);
                $result = mysqli_insert_id($this->db->con);
                return $result;
            }
        }
    }
    
}
?>