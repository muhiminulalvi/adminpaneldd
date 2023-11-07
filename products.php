<?php
include('functions/userfunctions.php');
include('includes/header.php');

if (isset($_GET['category'])) {


    $category_slug = $_GET['category'];
    $category_data = getSlugActive('categories', $category_slug);
    $category = mysqli_fetch_array($category_data);
    if ($category) {
        $cid = $category['id'];
        ?>

        <div class="py-3 bg-primary">
            <div class="container">
                <h3 class="text-white">Home / Collections /
                    <?= $category['name']; ?>
                </h3>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h1 class="text-center text-primary font-weight-bold">
                            <?= $category['name']; ?>
                        </h1>
                        <div class="row">
                            <?php
                            $products = getProdByCategory($cid);
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                                    ?>
                                    <div class="col-md-4 gap-6">
                                        <a href="#">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image"
                                                        class="w-100 rounded-3 mb-1" height="320px">
                                                    <h4 class="text-center">
                                                        <?= $item['name']; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>


                                    <?php
                                }
                            } else {
                                echo "No data available";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
    }


} else {
    echo "Something Went Wrong";
}
include('includes/footer.php'); ?>