<?php

include('functions/userfunctions.php');
include('includes/header.php'); ?>

<div class="py-3 ">
    <div class="container">
        <h3 class="text-dark">Home / Checkout</h3>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorders.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input required type="text" name="name" placeholder="Enter Your Name"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input required type="email" name="email" placeholder="Enter Your Email"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input required type="text" name="phone" placeholder="Enter Your Phone"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input required type="number" name="pincode" placeholder="Enter Your Pin Code"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea required name="address" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <?php $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $citem) {
                                ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                        </div>
                                        <div class="col-md-5">
                                            <label>
                                                <?= $citem['name'] ?>
                                            </label>
                                        </div>

                                        <div class="col-md-3 text-center">
                                            <label>

                                                <?= $citem['selling_price'] ?>
                                            </label>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label>
                                                X
                                                <?= $citem['prod_qty'] ?>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <?php
                                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];

                            }
                            ?>
                            <hr>

                            <h5>Total Price: <span class="float-end fw-bold">$
                                    <?= $totalPrice ?>
                                </span></h5>
                                <span>* Only Cash on Delivery is Available</span>

                            <div class="text-center">
                                <input type="hidden" name="payment_mode" value="COD" >
                                <input type="hidden" name="payment_id" value="0" >
                                <button name="place_order_btn" type="submit" class="btn btn-danger w-100">Confirm &
                                    Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>