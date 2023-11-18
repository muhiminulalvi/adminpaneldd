<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>


<div class="container-fluid py-4">
    <div class="row mx-5">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getById("product", $id);
                if(mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-danger">Add Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                    <div class="col-md-4 py-3">
                                        <label for="">Name</label>
                                        <input required type="text" value="<?= $data['name'] ?>" name="name" placeholder="Enter category name"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 py-3">
                                        <label for="">Select Category</label>
                                        <select name="category_id" class="form-select form-control"
                                            aria-label="Default select example">
                                            <option selected>Select -</option>
                                            <?php
                                            $category = getAll("categories");
                                            if (mysqli_num_rows($category) > 0) {
                                                foreach ($category as $item) {
                                                    ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']? 'selected': '' ?>>
                                                        <?= $item['name']; ?>
                                                    </option>
    
                                                    <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }
    
                                            ?>
    
    
    
                                        </select>
                                    </div>
                                    <div class="col-md-4 py-3">
                                        <label for="">Slug</label>
                                        <input required type="text" value="<?= $data['slug'] ?>" name="slug" placeholder="Enter slug name"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-12 py-3">
                                        <label for="">Description</label>
                                        <textarea required name="description" class="form-control"
                                            placeholder="Enter description" rows="3"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 py-3">
                                        <label for="">Upload Image</label>
                                        <input  type="file" name="image" class="form-control">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uploads/<?= $data['image'] ?>" width="50px" height="50px" alt="">
                                    </div>
                                    <div class="col-md-4 py-3">
                                        <label for="">Regular Price</label>
                                        <input required type="text" value="<?= $data['original_price'] ?>" name="original_price" class="form-control">
                                    </div>
                                    <div class="col-md-4 py-3">
                                        <label for="">Selling Price</label>
                                        <input required type="text" value="<?= $data['selling_price'] ?>" name="selling_price" class="form-control">
                                    </div>
                                    <div class="col-md-4 py-3">
                                        <label for="">Quantity</label>
                                        <input required type="text" name="quantity" value="<?= $data['qty'] ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] == '0' ? "": "checked" ?>>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" <?= $data['trending'] == '0' ? "": "checked" ?>>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100" name="update_product_btn">Update
                                            Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "Product not found";
                }
                   
            } else {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
    <?php include('includes/footer.php') ?>