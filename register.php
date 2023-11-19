<?php
session_start();
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already Logged in.";
    header('Location: index.php');
    exit();
}
include('includes/header.php'); ?>
<div class="container my-5">
    <form class=" shadow py-4 px-5 mx-5" method="post" action="functions\authcode.php">
        <?php
        if (isset($_SESSION['message'])) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Howdy!</strong> <?= $_SESSION['message']; ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['message']);
        }

        ?>

        <h2 class=" text-center">Registration Form</h2>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="validationDefault01" placeholder="mark123"
                    required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="validationDefault02"
                    placeholder="mark@outlook.com" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefaultUsername" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="validationDefaultUsername"
                    aria-describedby="inputGroupPrepend2" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefaultUsername" class="form-label">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" id="validationDefaultUsername"
                    aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <label for="validationDefault03" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="validationDefault03" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault04" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="validationDefault03" required>
            </div>

            <div class="col-md-4">
                <label for="validationDefault05" class="form-label">State</label>
                <input type="text" name="state" class="form-control" id="validationDefault05" required>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <label for="validationDefault06" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" id="validationDefault06" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault07" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="validationDefault07" required>
            </div>

            <div class="col-md-4">
                <label for="validationDefault08" class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control" id="validationDefault08" required>
            </div>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-danger my-3" name="register_btn" type="submit">Register</button>
        </div>
        <h6 class="text-center">Already have an account? Please <a href="login.php">Login</a>.</h6>
    </form>
</div>
<?php include('includes/footer.php'); ?>