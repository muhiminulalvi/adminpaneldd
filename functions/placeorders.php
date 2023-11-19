<?php


include("../config/dbcon.php");

require "placecustom.php";
if (isset($_SESSION['auth'])) {

    if (isset($_POST["place_order_btn"])) {
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $phone = mysqli_real_escape_string($con, $_POST["phone"]);
        $pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
        $address = mysqli_real_escape_string($con, $_POST["address"]);
        $payment_mode = mysqli_real_escape_string($con, $_POST["payment_mode"]);
        $payment_id = mysqli_real_escape_string($con, $_POST["payment_id"]);
        $tracking_no = "alvi".rand(1111,9999).substr($phone,2);

        $cartItems = getCartItems();
        $totalPrice = 0;
        foreach ($cartItems as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
        }
        $user_id = $_SESSION["auth_user"]["user_id"];
        $insert_query = "INSERT INTO orders (name,tracking_no, user_id, email, phone, address, pin_code, total_price, payment_mode, payment_id) VALUES ('$name','$tracking_no','$user_id','$email','$phone','$address','$pincode','$totalPrice','$payment_mode','$payment_id')";

        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run){
            $order_id = mysqli_insert_id($con);
            foreach ($cartItems as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];
                $insert_items_query = "INSERT INTO order_items (order_id,prod_id,qty,price) VALUES ('$order_id','$prod_id','$prod_qty','$price')";
                $insert_items_query_run = mysqli_query($con, $insert_items_query);

                $product_query = "SELECT * FROM product WHERE id='$prod_id'";
                $product_query_run = mysqli_query($con, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData["qty"];

                $new_qty =  $current_qty - $prod_qty;

                $updateQTY_query = "UPDATE product SET qty='$new_qty' WHERE id='$prod_id'";
                $updateQTY_run = mysqli_query($con, $updateQTY_query);
            }
            $deleteCartQuery = "DELETE FROM carts WHERE user_id='$user_id'";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            $_SESSION["message"] = "Order Place Successfully";
            header("Location: ../my_orders.php");
            die();
            
        }
    }
} else {
    header("Location: ../index.php");
}

?>