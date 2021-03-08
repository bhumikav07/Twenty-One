<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                
                $result = $this->db->con->query($query_string);
                print_r(mysqli_error($this->db->con));
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // Calculate Subtotal Section
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    //Calculate Total in checkout
    public function getSumation($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    //Get item_id shopping cart list
    public function getCartId($cartArray = null,$key = "item_id"){
        if($cartArray != null){
            $cart_id = array_map(function($value) use($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    public function updateincrquantity($item_id){

        $query_string = sprintf("UPDATE cart SET quantity = quantity+1 WHERE item_id=%s AND deleted=0", $item_id);
        $result = $this->db->con->query($query_string);
        return $result;
    }

    public function updatedecrquantity($item_id){

        $query_string = sprintf("UPDATE cart SET quantity = quantity-1 WHERE item_id=%s AND deleted=0",$item_id);
        $result = $this->db->con->query($query_string);
        return $result;
    }

    public function getQuantityData($item_id, $table='cart'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id} AND deleted=0");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
    
    public function updateDeleted($order_id , $user_id){
        $query_string = sprintf("UPDATE cart SET deleted = 1, order_id=%s WHERE user_id=%s AND deleted=0 ",$order_id,$user_id);
        $result = $this->db->con->query($query_string);
        return $result;
    }

}