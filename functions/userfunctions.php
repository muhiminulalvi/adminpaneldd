<?php 

session_start();
include("config/dbcon.php");

function getAllActive($table){
    global $con;
    $query = "SELECT * FROM $table WHERE status = '0' ";
    return $query_run = mysqli_query($con, $query);
}
function getAllTrending(){
    global $con;
    $query = "SELECT * FROM product WHERE trending = '1' LIMIT 9";
    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table,$slug){
    global $con;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id){
    global $con;
    $query = "SELECT * FROM product WHERE category_id = '$category_id' AND status = '0' ";
    return $query_run = mysqli_query($con, $query);
}

function getCartItems(){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id,c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, product p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}
function getIDActive($table,$id){
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id' AND status = '0' ";
    return $query_run = mysqli_query($con, $query);
}
function getOrders(){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId'";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message){
    $_SESSION['message'] = $message;
        header('Location: '. $url);
        exit();
}

function checkTrackingNo($trackingNo){
    global $con;    
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId'";
    return mysqli_query($con, $query);
}

?>