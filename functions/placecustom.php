<?php 

session_start();
include("../config/dbcon.php");


function getCartItems(){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id,c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, product p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}


?>