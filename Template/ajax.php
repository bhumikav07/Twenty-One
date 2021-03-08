<?php

//Require MySQL Connection
require('../Database/DBController.php');
//Require Cart Class
require('../Database/Cart.php');
//Require Product Class
require('../Database/Product.php');
//DBController Object
$db = new DBController();
//Product Object
$product = new Product($db);

$cart = new Cart($db);

if (isset($_POST['itemid'])){
    if ($_POST['type']=='incr'){
        $res = $cart->updateincrquantity($_POST['itemid']);
    }
    else{
        $res = $cart->updatedecrquantity($_POST['itemid']);
    }
    $res = $product->getProduct($_POST['itemid']);
    echo json_encode($res);
}
?>