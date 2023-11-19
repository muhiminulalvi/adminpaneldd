<?php

include('functions/userfunctions.php');
include('includes/header.php'); ?>

<div class="py-3 ">
    <div class="container">
        <h3 class="text-dark">Home / Orders</h3>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="">


            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getOrders();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $item['id'] ?>
                                        </td>
                                        <td>
                                            <?= $item['tracking_no'] ?>
                                        </td>
                                        <td>
                                            <?= $item['total_price'] ?>
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
</div>
<?php include('includes/footer.php'); ?>