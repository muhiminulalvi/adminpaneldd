<?php
session_start();
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already Logged in.";
    header('Location: index.php');
    exit();
}
include('includes/header.php'); ?>
<div class=" container-sm my-5">
    <form class=" shadow py-4 px-4 mx-auto w-25 " method="post" action="functions\authcode.php">
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

        <h2 class=" text-center">Please Login</h2>
        <div class="row g-3 ">

            <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="validationDefault02"
                    placeholder="mark@outlook.com" required>
            </div>
            <div class="col-md-12">
                <label for="validationDefaultUsername" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="validationDefaultUsername"
                    aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
        
        
        <div class="col-12 text-center">
            <button class="btn btn-danger my-3" name="login_btn" type="submit">Login</button>
        </div>
    </form>
</div>
<?php include('includes/footer.php'); ?>