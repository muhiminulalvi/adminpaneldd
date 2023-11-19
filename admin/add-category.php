
<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>

<div class="container-fluid py-4">
    <div class="row mx-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-danger">Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 py-3">
                                <label for="">Name</label>
                                <input required type="text" name="name" placeholder="Enter category name" class="form-control">
                            </div>
                            <div class="col-md-6 py-3">
                                <label for="">Slug</label>
                                <input required type="text" name="slug" placeholder="Enter slug name" class="form-control">
                            </div>
                            <div class="col-md-12 py-3">
                                <label for="">Description</label>
                                <textarea required name="description" class="form-control" placeholder="Enter description"
                                    rows="3"></textarea>
                            </div>
                            <div class="col-md-12 py-3">
                                <label for="">Upload Image</label>
                                <input required type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6 ">
                                <label for="">Status</label>
                                <input  type="checkbox" name="status">
                            </div>
                            <div class="col-md-6 ">
                                <label for="">Popular</label>
                                <input  type="checkbox" name="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger w-100" name="add_category_btn">Add
                                    Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>