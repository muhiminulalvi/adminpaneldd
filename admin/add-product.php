
<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>

<div class="container-fluid py-4">
    <div class="row mx-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-danger">Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 py-3">
                                <label for="">Name</label>
                                <input required type="text" name="name" placeholder="Enter category name"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 py-3">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select form-control" aria-label="Default select example">
                                    <option selected>Select -</option>
                                    <?php
                                    $category = getAll("categories");
                                    if (mysqli_num_rows($category) > 0) {
                                        foreach ($category as $item) {
                                            ?>
                                            <option value="<?= $item['id']; ?>">
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
                                <input required type="text" name="slug" placeholder="Enter slug name"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 py-3">
                                <label for="">Description</label>
                                <textarea required name="description" class="form-control"
                                    placeholder="Enter description" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 py-3">
                                <label for="">Upload Image</label>
                                <input required type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-4 py-3">
                                <label for="">Regular Price</label>
                                <input required type="text" name="original_price" class="form-control">
                            </div>
                            <div class="col-md-4 py-3">
                                <label for="">Selling Price</label>
                                <input required type="text" name="selling_price" class="form-control">
                            </div>
                            <div class="col-md-4 py-3">
                                <label for="">Quantity</label>
                                <input required type="text" name="quantity" class="form-control">
                            </div>
                            <div class="col-md-6 ">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6 ">
                                <label for="">Trending</label>
                                <input type="checkbox" name="trending">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100" name="add_product_btn">Add
                                    Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>