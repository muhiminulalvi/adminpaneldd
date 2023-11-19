<?php include('includes/header.php') ?>
<?php include('../middleware/adminmiddleware.php') ?>


<div class="container-fluid py-4">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-12">
            <h1 class="text-dark text-center fw-bold">Welcome to Admin Dashboard</h1>
            <hr class="bg-danger">
        </div>
        <div class="col-md-12">
            <?php

            // Total users query
            $totalUsersQuery = "SELECT COUNT(*) as totalUsers FROM users";
            $totalUsersResult = mysqli_query($con, $totalUsersQuery);
            $totalUsersRow = mysqli_fetch_assoc($totalUsersResult);
            $totalUsers = $totalUsersRow['totalUsers'];

            // Total revenue query
            $totalRevenueQuery = "SELECT SUM(total_price) as totalRevenue FROM orders";
            $totalRevenueResult = mysqli_query($con, $totalRevenueQuery);
            $totalRevenueRow = mysqli_fetch_assoc($totalRevenueResult);
            $totalRevenue = $totalRevenueRow['totalRevenue'];

            // Total orders query
            $totalOrdersQuery = "SELECT COUNT(*) as totalOrders FROM orders";
            $totalOrdersResult = mysqli_query($con, $totalOrdersQuery);
            $totalOrdersRow = mysqli_fetch_assoc($totalOrdersResult);
            $totalOrders = $totalOrdersRow['totalOrders'];

            // Total products query
            $totalProductsQuery = "SELECT COUNT(*) as totalProducts FROM product";
            $totalProductsResult = mysqli_query($con, $totalProductsQuery);
            $totalProductsRow = mysqli_fetch_assoc($totalProductsResult);
            $totalProducts = $totalProductsRow['totalProducts'];
            ?>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card text-center py-3 bg-dark" style="width: 100%;">
                                <i class="fa fa-user text-white display-3"></i>
                            <div class="card-body">
                                <h4 class="text-white fw-bold">Total Users</h4>
                                <h6 class="text-white fw-bold"><?= $totalUsers ?></h6>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card text-center py-3 bg-primary" style="width: 100%;">
                                <i class="fa fa-money text-white display-3"></i>
                            <div class="card-body">
                                <h4 class="text-white fw-bold">Total Revenues</h4>
                                <h6 class="text-white fw-bold">$<?= $totalRevenue ?></h6>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card text-center py-3 bg-success" style="width: 100%;">
                        <i class="material-icons text-white fs-1">shopping_cart</i>
                            <div class="card-body">
                                <h4 class="text-white fw-bold">Total Orders</h4>
                                <h6 class="text-white fw-bold"><?= $totalOrders ?></h6>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card text-center py-3 bg-warning" style="width: 100%;">
                        <i class="material-icons text-white fs-1">credit_card</i>
                            <div class="card-body">
                                <h4 class="text-white fw-bold">Total Products</h4>
                                <h6 class="text-white fw-bold"><?= $totalProducts ?></h6>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
            <?php


            ?>
        </div>
    </div>
    <?php include('includes/footer.php') ?>