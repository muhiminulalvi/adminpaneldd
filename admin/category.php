<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>


<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class=" align-middle">
                            <?php
                            $category = getAll("categories");
                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $item['id'] ?>
                                        </td>
                                        <td>
                                            <?= $item['name'] ?>
                                        </td>
                                        <td><img src=" ../uploads/<?= $item['image'] ?>" height="100px "
                                                alt="<?= $item['name'] ?>" class=" w-50"></td>
                                        <td>
                                            <?= $item['status'] == '0' ? "Visible" : "Hidden" ?>
                                        </td>
                                        <td class="" >
                                            <a href="edit_category.php?id=<?= $item['id'] ?>" class="btn btn-danger">Edit</a>
                                            
                                        </td>
                                        <td>
                                        <form class=""  action="code.php" method="POST">
                                                <input type="hidden" name="category_id" value="<?= $item['id'] ?>">
                                                <button class="btn btn-danger" type="submit"
                                                    name="delete_category_btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>