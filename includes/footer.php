<footer class="bg-dark text-light pt-5 pb-2 position-relative bottom-0 w-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5> ÉLECTRICITÉ</h5>
                <p class="text-light">ÉLECTRICITÉ is your destination for high-quality electronic components and
                    gadgets. Explore our wide range of products to power up your projects.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Shop</a></li>
                    <li><a href="#" class="text-light text-decoration-none">About Us</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact Information</h5>
                <p class="text-light">123 Avenue, Rangpur<br>Bangladesh, 5400<br>Email: contact@electricite.com<br>Phone:
                    +123456789</p>
            </div>
        </div>

        <div class="text-center bg-dark">
            <p>&copy; 2023 ÉLECTRICITÉ. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<script src="assets/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php if (isset($_SESSION['message'])) { ?>
        
        alertify.success('<?= $_SESSION['message']; ?>');
        <?php
        unset($_SESSION['message']);
    }
    ?>
</script>

<script src="assets/custom.js"></script>
<!-- <script src="assets/js/custom.js"></script> -->
</body>

</html>