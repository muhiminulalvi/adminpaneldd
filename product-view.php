<?php
include('functions/userfunctions.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive('product', $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
        ?>
        <div class="py-3 mb-10 bg-primary">
            <div class="container">
                <h3 class="text-white">Home / Collections /
                    <?= $product['name']; ?>
                </h3>
            </div>
        </div>
        <div class="container" style="padding-top: 50px;">
            <div class="row ">
                <div class="col-md-4">
                    <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                </div>
                <div class="col-md-8 ">
                    <h4>
                        <?= $product['name']; ?>
                    </h4>
                    <hr>
                    <h5>
                        <?= $product['description']; ?>
                    </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>$ <s><?= $product['original_price']; ?></s></h4>
                           
                        </div>
                        <div class="col-md-3">
                           
                            <h4>$ <?= $product['selling_price']; ?></h4>
                        </div>
                        
                    </div>
                    <h5>
                       Quantity: <?= $product['qty']; ?>
                    </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-danger addToCartButton" value="<?= $product['id']; ?>" >Add to Cart</button>
                            <button class="btn btn-primary" >Add to Wishlist</button>
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