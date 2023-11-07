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
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $category = getAll("categories");
                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) {
                                    ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><img src=" ../uploads/<?= $item['image'] ?>" width="50px" height="50pxi " alt="<?= $item['name'] ?>" class=" w-25" ></td>
                                        <td><?= $item['status'] == '0' ? "Visible":"Hidden" ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary" >Edit</a>
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