<nav class="navbar navbar-expand-lg bg-danger navbar-dark shadow-lg">
  <div class="container">
    <a class="navbar-brand text-uppercase fw-bold fs-1" href="index.php"> électricité</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <a class="nav-link active fs-5" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  fs-5" href="categories.php">Categories</a>
        </li>
        
        <?php
        if (isset($_SESSION['auth'])) {
          ?>
          <li class="nav-item">
            <a class="nav-link fs-5" aria-current="page" href="cart.php">Carts</a>
          </li>
          <li class="nav-item">
          <a class="nav-link  fs-5" href="my_orders.php">Orders</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['username']; ?>
            </a>
            <ul class="dropdown-menu">
              
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>


          <?php
        } else {
          ?>
          <li class="nav-item">
            <a class="nav-link fs-5" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="login.php">Login</a>
          </li>

          <?php
        }

        ?>


        
      </ul>
      
    </div>
  </div>
</nav>