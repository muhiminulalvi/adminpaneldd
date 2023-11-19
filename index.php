<?php

include('functions/userfunctions.php');
include('includes/header.php'); ?>

<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Howdy!</strong>
                        <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }

                ?>

            </div>
        </div>
    </div>
</div>
<section class="container py-10">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h2 class=" display-3">Welcome To ÉLECTRICITÉ</h2>
            <h5 class="">Visit the best shop in the city. Buy your required products at a reasonable price.</h5>
            <button class="btn btn-danger">Get Started</button>
        </div>
        <div class="col-md-6">
            <img src="assets\img\hero_sec.jpg" class="img-fluid" alt="">
        </div>
    </div>
</section>
<section class="about-section bg-body-tertiary py-5">
    <div class="container py-5">
        <div class="row justify-content-between align-items-center g-3">
            <div class="col-md-6">
                <img src="assets\img\electricity.jpg" class="img-fluid rounded-3 shadow-lg" alt="About Us Image">
            </div>
            <div class="col-md-6 px-4">
                <h2 class="text-danger display-5">About Us</h2>
                <p class="about-description">
                    ÉLECTRICITÉ, a premier destination for high-quality electronic components and gadgets, aims to
                    empower your projects with top-notch products and innovative solutions. We strive to provide a
                    diverse range of electronics, ensuring your projects are powered to perfection. Our commitment to
                    quality and customer satisfaction drives us to deliver excellence.
                </p>
                <p class="about-description">
                    At ÉLECTRICITÉ, we embrace creativity and reliability, offering a wide selection of products to
                    cater to your electronic needs. With a passion for technology, our team is dedicated to delivering
                    exceptional products and exceptional service to our valued customers.
                </p>
            </div>
        </div>
    </div>
</section>
<div class=" py-5 ">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <h1 class="text-center text-danger mb-5 font-weight-bold">Our Cateogries</h1>
                <div class="row justify-content-center align-items-center g-5">
                    <?php
                    $categories = getAllActive('categories');
                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                            ?>
                            <div class="col-md-4 gap-6">
                                <a href="products.php?category=<?= $item['slug']; ?>">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Category Image"
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
<div class="bg-body-tertiary py-5">
    <div class="container  py-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-danger font-weight-bold">Get In Touch With Us</h2>
                <p>At ÉLECTRICITÉ, we embrace creativity and reliability, offering a wide selection of products to cater
                    to your electronic needs. With a passion for technology, our team is dedicated to delivering
                    exceptional products and exceptional service to our valued customers.</p>
                <h5><i class="fa fa-envelope"></i> contact@electricite.com</h5>
                <h5><i class="fa fa-phone"></i> +123456789</h5>
                <div>
                    <i class="fa fs-2 p-2 fa-facebook-square"></i>
                    <i class="fa fs-2 p-2 fa-twitter"></i>
                    <i class="fa fs-2 p-2 fa-whatsapp"></i>
                    <i class="fa fs-2 p-2 fa-pinterest"></i>
                </div>
            </div>
            <div class="col-md-6 ">

                <form>
                    <div class="mb-3">   
                        <input type="email" class="form-control py-4 px-5 rounded-1 shadow-lg border-0" placeholder="Enter your email"  id="exampleInputEmail1" aria-describedby="emailHelp">  
                    </div>
                    <div class="mb-3">
                        
                        <textarea type="text" class="form-control py-4 px-5 rounded-1 shadow-lg border-0" id="exampleInputPassword1" placeholder="Write your message"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-danger w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>