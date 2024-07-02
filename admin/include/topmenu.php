<section class="navbar-section fixed-top wow fadeInDown">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <div class="logo">
                                <a href="dashboard.php">
                                    <img src="images/logo.png" alt="">
                                </a>
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" data-page="home" href="dashboard.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#categories">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jobs">Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#download">Download</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sponsors">Sponsors</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Account
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="apply.php?do=Edit&id=<?php echo $_SESSION['id'];?>">Edit Profile</a></li>
                                        <?php
                                            if($_SESSION['role'] == 1) {
                                                ?>
                                                    <li><a class="dropdown-item" href="apply.php?do=Manage">Recruit</a></li>
                                                <?php
                                            }
                                        ?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="nav-item dropdown-item">
                                            <a class="nav-link sign-out" href="logout.php">Sign Out</a>
                                        </li>
                                    </ul>
                                </li>

                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                    <div class="image">
                                        <?php
                                        //Profile Image (SELF)
                                        if (empty($_SESSION['image'])) {
                                        ?>
                                            <div class="design">
                                                <img src="images/users/default.webp" alt="" class="img-circle elevation-2 avatar-img2">
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <img src="images/users/<?php echo $_SESSION['image']; ?>" alt="" class="img-circle elevation-2 avatar-img2">
                                        <?php
                                        }
                                        ?>
                                    </div>


                                    <div class="info">
                                        <a href="#" class="d-block" style="font-size: 15px; font-weight: 700;"><?php echo $_SESSION['fullname']; ?></a>
                                    </div>
                                </div>
                                <!-- 
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Sign Out</a>
                                </li> -->


                            </ul>
                        </div>
                    </div>
                    <div class="trans"></div>
                </nav>

            </div>
        </div>
    </div>
</section>