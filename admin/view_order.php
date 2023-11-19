<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>
<?php

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderData = checkTrackingNo($tracking_no);
    if (mysqli_num_rows($orderData) < 0) {
        ?>
        <h4>Something Went Wrong</h4>
        <?php
        die();
    }
} else {
    ?>
    <h4>Something Went Wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($orderData);

?>

<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 px-4">
                            <h4>Customer Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label fw-bold">Name</label>
                                    <div class="border form-control">
                                        <?= $data['name']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label fw-bold">Email</label>
                                    <div class="border form-control">
                                        <?= $data['email']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label fw-bold">Phone</label>
                                    <div class="border form-control">
                                        <?= $data['phone']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label fw-bold">Tracking No</label>
                                    <div class="border form-control">
                                        <?= $data['tracking_no']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label fw-bold">Address</label>
                                    <div class="border form-control">
                                        <?= $data['address']; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label fw-bold">Pin Code</label>
                                    <div class="border form-control">
                                        <?= $data['pin_code']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 px-4">
                            <h4>Order Information</h4>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    // $order_query = "SELECT o.id AS oid, o.tracking_no, o.user_id, oi.*,oi.qty AS orderqty, p.* 
                                    //             FROM orders o
                                    //             INNER JOIN order_items oi ON oi.order_id = o.id
                                    //             INNER JOIN product p ON p.id = oi.prod_id
                                    //             WHERE o.user_id = '$userId' AND o.tracking_no = '$tracking_no'";
                                    // $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,p.* FROM orders o, order_items oi, product p WHERE oi.order_id='o.id' AND p.id='oi.prod_id' AND o.tracking_no='$tracking_no'";
                                    $order_query = "SELECT 
                    o.id AS oid, 
                    o.tracking_no, 
                    o.user_id, 
                    oi.*, 
                    oi.qty AS orderqty,
                    p.* 
                FROM 
                    orders o
                INNER JOIN 
                    order_items oi ON oi.order_id = o.id
                INNER JOIN 
                    product p ON p.id = oi.prod_id
                WHERE 
                    o.tracking_no = '$tracking_no'";

                                    $order_query_run = mysqli_query($con, $order_query);
                                    if (mysqli_num_rows($order_query_run) > 0) {
                                        foreach ($order_query_run as $item) {
                                            ?>
                                            <tr>
                                                <td class=" align-middle"><img src="../uploads/<?= $item['image']; ?>"
                                                        width="50px" height="50px" alt="<?= $item['name']; ?>"></td>
                                                <td class=" align-middle">$
                                                    <?= $item['price'] ?>
                                                </td>
                                                <td class=" align-middle">
                                                    <?= $item['orderqty'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <hr>
                            <h4 class=" px-4">Total Price: <span class="float-end fw-bold">$
                                    <?= $data['total_price']; ?>
                                </span></h4>

                            <hr>
                            <label class="form-label fw-bold">Payment Method:</label>
                            <div class="border p-2 mb-3">

                                <?= $data['payment_mode']; ?>
                            </div>
                            <label class="form-label fw-bold">Status:</label>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="tracking_no" value="<?= $data['tracking_no']; ?>">
                                <select class="form-select" name="order_status">

                                    <option value="0" <?= $data['status'] == 0 ? "selected" : "" ?>>Under Process</option>
                                    <option value="1" <?= $data['status'] == 1 ? "selected " : "" ?>>Completed</option>
                                    <option value="2" <?= $data['status'] == 2 ? "selected " : "" ?>>Cancelled</option>
                                </select>
                                <button type="submit" name="update_status_btn" class="btn btn-danger my-1">Update Status</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>