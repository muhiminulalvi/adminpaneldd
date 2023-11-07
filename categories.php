<?php
include('functions/userfunctions.php');
include('includes/header.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="text-center text-primary font-weight-bold">Our Collections</h1>
                <div class="row">
                    <?php
                    $categories = getAllActive('categories');
                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                            ?>
                            <div class="col-md-4 gap-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100 rounded-3 mb-1" height="320px" >
                                        <h4 class="text-center">
                                            <?= $item['name']; ?>
                                        </h4>
                                    </div>
                                </div>
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
<?php include('includes/footer.php'); ?>