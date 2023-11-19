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
    $filename = time().".".$image_ext;
    $cate_query = "INSERT INTO categories(name,slug,description,status,popular,image) VALUES ('$name','$slug','$description','$status','$popular','$filename')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'. $filename);
        redirect("add-category.php", "Category Added Successfully");
    } else {
        redirect("add-category.php", "Something went wrong");
    }
} else if (isset($_POST['add_product_btn'])) {
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
    $filename = time().".".$image_ext;

    $product_query = "INSERT INTO product(name,category_id,slug,description,original_price,selling_price,qty,status,trending,image) VALUES ('$name','$category_id','$slug','$description','$original_price','$selling_price','$quantity','$status','$trending','$filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if ($product_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-product.php", "Product Added Successfully");
    } else {
        redirect("add-product.php", "Something went wrong");
    }
} else if (isset($_POST["update_category_btn"])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . "." . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $path = "../uploads";
    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES["image"]["tmp_name"], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("edit_category.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit_category.php?id=$category_id", "Something went wrong");
    }
} else if (isset($_POST["delete_category_btn"])) {
    $category_id = mysqli_real_escape_string($con, $_POST["category_id"]);
    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data["image"];
    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);  
    if ($delete_query_run) {   
        if(file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);}
        redirect("category.php", "Category Deleted Successfully"); 
    } else {
        redirect("category.php", "Something went wrong");
    }
} else if (isset($_POST["update_product_btn"])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $product_id = $_POST['product_id'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['quantity'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().".".$image_ext;
    } else {
        $update_filename = $old_image;
    }
    $update_product_query = "UPDATE product SET name='$name', slug='$slug', description='$description', original_price='$original_price', selling_price='$selling_price', qty='$quantity', status='$status', trending='$trending', image='$update_filename' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);
    if($update_product_query_run){
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES["image"]["tmp_name"], $path.'/'.$update_filename);
            if (file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit_product.php?id=$product_id", "Product Updated Successfully");
    }
    else {
        redirect("edit_product.php?id=$product_id", "Something went wrong");
    }
}
else if (isset($_POST["delete_product_btn"])){
    $product_id = mysqli_real_escape_string($con, $_POST["product_id"]);
    $product_query = "SELECT * FROM product WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data["image"];
    $delete_query = "DELETE FROM product WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);  
    if ($delete_query_run) {   
        if(file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);}
        // redirect("products.php", "Product Deleted Successfully"); 
        echo 200;
    } else {
        // redirect("products.php", "Something went wrong");
        echo 500;
    }
} else if(isset($_POST["update_status_btn"])){
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $updateOrderQuery = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'";
    $updateOrderQuery_run = mysqli_query($con, $updateOrderQuery);

    redirect("view_order.php?t=$track_no", "Order Status Updated Successfully");
}
else {
    header("Location: ../index.php");
}

?>