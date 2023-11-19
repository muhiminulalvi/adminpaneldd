<?php

include('functions/userfunctions.php');
include('includes/header.php'); ?>

<div class="py-3 ">
    <div class="container">
        <h3 class="text-dark">Home / Carts</h3>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="">


            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-md mb-3 py-3 px-4">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <h4>Product Image</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>
                                    Name
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Action</h4>
                            </div>
                        </div>
                    </div>
                    <div id="myCart">


                        <?php $items = getCartItems();
                        if(mysqli_num_rows($items) > 0) {

                        foreach ($items as $citem) {
                            ?>
                            <div class="card product_data shadow-md mb-3 py-3 px-4">


                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" class="" width="80px">
                                    </div>
                                    <div class="col-md-4">
                                        <h5>
                                            <?= $citem['name'] ?>
                                        </h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" name="" class="prodId" value="<?= $citem['prod_id'] ?>">
                                        <div class="input-group mb-3" style="width:130px;">
                                            <button class="input-group-text decrement_btn updateQTY">-</button>
                                            <input type="text" class="form-control  input_qty text-center" disabled
                                                value="<?php echo isset($citem['prod_qty']) ? $citem['prod_qty'] : ''; ?>">
                                            <button class="input-group-text increment_btn updateQTY">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>
                                            $
                                            <?= $citem['selling_price'] ?>
                                        </h6>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-danger deleteItem" value="<?= $citem['cid'] ?>"><i
                                                class="fa fa-trash me-2"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                            <?php


                        }} else {
                            ?>
                            <h3>Cart is Empty</h3>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="float-end">
                        <a href="checkout.php" class="btn btn-outline-primary">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>