<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunctions.php");
if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_ext;
    $cate_query = "INSERT INTO categories(name,slug,description,status,popular,image) VALUES ('$name','$slug','$description','$status','$popular','$filename')";

    $cate_query_run = mysqli_query($con,$cate_query);

    if($cate_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        redirect("add-category.php","Category Added Successfully");
    }
    else{
        redirect("add-category.php","Something went wrong");
    }
}
else if (isset($_POST['add_product_btn'])){
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['quantity'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_ext;

    $product_query = "INSERT INTO product(name,category_id,slug,description,original_price,selling_price,qty,status,trending,image) VALUES ('$name','$category_id','$slug','$description','$original_price','$selling_price','$quantity','$status','$trending','$filename')";

    $product_query_run = mysqli_query($con,$product_query);

    if($product_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        redirect("add-product.php","Product Added Successfully");
    }
    else{
        redirect("add-product.php","Something went wrong");
    }
}

?>