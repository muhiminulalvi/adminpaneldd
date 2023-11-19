<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>

<div class="container-fluid py-4">
    <div class="row mx-5">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getById("categories", $id);

                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-danger">Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                    <div class="col-md-6 py-3">
                                        <label for="">Name</label>
                                        <input required type="text" name="name" placeholder="Enter category name"
                                        value="<?= $data['name'] ?>"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 py-3">
                                        <label for="">Slug</label>
                                        <input required type="text" name="slug" placeholder="Enter slug name"
                                        value="<?= $data['slug'] ?>"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-12 py-3">
                                        <label for="">Description</label>
                                        <textarea required name="description" class="form-control"
                                            placeholder="Enter description" rows="3"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 py-3">
                                        <label for="">Upload Image</label>
                                        <input required type="file" name="image" class="form-control my-1">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uploads/<?= $data['image'] ?>" width="50px" height="50px" alt="">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] ? "checked": "" ?>>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="">Popular</label>
                                        <input type="checkbox" <?= $data['popular'] ? "checked": "" ?> name="popular">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger w-100" name="update_category_btn">Update
                                            Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                } else {
                    echo "Category not found";
                }
            } else {
                echo 'Something Went Wrong';
            }
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>