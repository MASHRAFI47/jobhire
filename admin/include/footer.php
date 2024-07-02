<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="logos">
                    <img src="images/logo.png" alt="">
                </div>
                <div class="text">
                    <h5>Call Us</h5>
                    <p>123 456 789</p>
                    <p>328 Queensberry Street, North America <br> 3051 Australia <br> support@bussiness.com</p>
                </div>
            </div>
            <div class="col">
                <div class="text">
                    <h4>For Candidate</h4>
                    <ul>
                        <li>
                            <a href="#">Browse Jobs</a>
                        </li>
                        <li>
                            <a href="#">Browse Candidates</a>
                        </li>
                        <li>
                            <a href="#">Candidate Dashboard</a>
                        </li>
                        <li>
                            <a href="#">Job Alerts</a>
                        </li>
                        <li>
                            <a href="#">My Bookmarks</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col">
                <div class="text">
                    <h4>For Employers</h4>
                    <ul>
                        <li>
                            <a href="#">All Employers</a>
                        </li>
                        <li>
                            <a href="#">Employers Dashboard</a>
                        </li>
                        <li>
                            <a href="#">Submit Job</a>
                        </li>
                        <li>
                            <a href="#">Job Packages</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col">
                <div class="text">
                    <h4>About Us</h4>
                    <ul>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                        <li>
                            <a href="#">Packages</a>
                        </li>
                        <li>
                            <a href="#">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col">
                <div class="text">
                    <h4>For Candidate</h4>
                    <ul>
                        <li>
                            <a href="#">Site Map</a>
                        </li>
                        <li>
                            <a href="#">Terms of Use</a>
                        </li>
                        <li>
                            <a href="#">Privacy Center</a>
                        </li>
                        <li>
                            <a href="#">Security Center</a>
                        </li>
                        <li>
                            <a href="#">Accessibility Center</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>






<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<!-- owl carousel -->
<script src="js/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<script src="js/wow.js"></script> 
<script>
    new WOW().init();
</script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 4
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    })
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <?php ob_end_flush();?>
</body>
</html>