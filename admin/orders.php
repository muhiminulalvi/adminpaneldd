<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>


<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Orders</h3>
                </div>
                <div class="card-body" id="product_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Email</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                          

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getAllOrders();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $item['id'] ?>
                                        </td>
                                        <td>
                                            <?= $item['email'] ?>
                                        </td>
                                        <td>
                                            <?= $item['tracking_no'] ?>
                                        </td>
                                        <td>
                                            <?= $item['total_price'] ?>
                                        </td>
                                        <td>
                                             <?= $item['status'] == 0 ? 'Under Process':'Completed' ?>
                                        </td>
                                        <td>
                                            <?= $item['payment_mode'] ?>
                                        </td>
                                        <td>
                                            <?= $item['created_at'] ?>
                                        </td>
                                        
                                        
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" >
                                        No orders yet.
                                    </td>
                                    
                                </tr>
                                <?php
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>