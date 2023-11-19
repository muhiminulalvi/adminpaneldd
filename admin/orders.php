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
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle text-center">User Name</th>
                                <th class="align-middle text-center">User Email</th>
                                <th class="align-middle text-center">Tracking No</th>
                                <th class="align-middle text-center">Price</th>
                            
                                
                                <th class="align-middle text-center">Date</th>
                                <th class="align-middle text-center">View</th>
                          

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getAllOrders();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                                    ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <?= $item['id'] ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $item['name'] ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $item['email'] ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $item['tracking_no'] ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?= $item['total_price'] ?>
                                        </td>
                                        
                                        
                                        <td class="align-middle text-center">
                                            <?= $item['created_at'] ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="view_order.php?t=<?= $item['tracking_no'] ?>" class="btn btn-danger" >View Details</a>
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