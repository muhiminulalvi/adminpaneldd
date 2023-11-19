<?php
include('functions/userfunctions.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive('product', $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
        ?>
        <div class="py-3 mb-10 ">
            <div class="container">
                <h3 class="text-dark">Home / Collections /
                    <?= $product['name']; ?>
                </h3>
            </div>
        </div>
        <div class="container product_data" style="padding-top: 50px;">
            <div class="row ">
                <div class="col-md-4">
                    <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                </div>
                <div class="col-md-8 ">
                    <h4>
                        <?= $product['name']; ?>
                        <span class="float-end text-danger">
                            <?php
                            if ($product['trending']) {
                                echo "Trending";
                            }
                            ?>
                        </span>
                    </h4>
                    <hr>

                    <h6>
                        Welcome to électricité! Discover a diverse array of top-quality electronic components at our ecommerce
                        platform. Explore and shop for a wide range of electronics essentials, making your projects and
                        innovations a reality."
                    </h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>$ <s>
                                    <?= $product['original_price']; ?>
                                </s></h4>

                        </div>
                        <div class="col-md-3">

                            <h4>$
                                <?= $product['selling_price']; ?>
                            </h4>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">

                            <div class="input-group mb-3" style="width:130px;">
                                <button class="input-group-text decrement_btn">-</button>
                                <input type="text" class="form-control bg-white input_qty text-center" disabled value="1">
                                <button class="input-group-text increment_btn">+</button>
                            </div>
                        </div>
                    </div>
                    <!-- <h5>
                        Quantity:
                        
                    </h5> -->
                    <div class="row my-2">
                        <div class="col-md-12">
                            <button class="btn btn-danger addToCartButton" value="<?= $product['id']; ?>"><i
                                    class="fa fa-shopping-cart"></i> Add to Cart</button>
                            <button class="btn btn-primary"><i class="fa fa-heart"></i> Add to Wishlist</button>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Product Description:</h4>
                            <?= $product['description']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
    } else {
        echo "Product Not Found";
    }


} else {
    echo "Something Went Wrong";
}
include('includes/footer.php'); ?>