<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>


<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products</h3>
                </div>
                <div class="card-body" id="product_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = getAll("product");
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                                    ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><img src=" ../uploads/<?= $item['image'] ?>" width="50px" height="50pxi " alt="<?= $item['name'] ?>" class=" w-25" ></td>
                                        <td><?= $item['status'] == '0' ? "Visible":"Hidden" ?></td>
                                        <td>
                                            <a href="edit_product.php?id=<?= $item['id'] ?>" class="btn btn-danger" >Edit</a>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-danger delete_product_btn" value="<?= $item['id'] ?>">Delete</button>
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