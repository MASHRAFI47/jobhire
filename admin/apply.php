<?php include "include/header.php" ?>

</div>
</div>

<?php
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

if ($do == "Manage") {
?>
    <section class="content contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">All Users Information</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="table" style="overflow-x:auto;">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl.</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">CV</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // read from apply table
                                        $sql = "SELECT * FROM apply";
                                        $all_apply = mysqli_query($db, $sql);
                                        $i = 0;


                                        while ($row = mysqli_fetch_assoc($all_apply)) {
                                            $id             = $row['id'];
                                            $username       = $row['username'];
                                            $fullname       = $row['fullname'];
                                            $email          = $row['email'];
                                            $description    = $row['description'];
                                            $phone          = $row['phone'];
                                            $address        = $row['address'];
                                            $gender         = $row['gender'];
                                            $image          = $row['image'];
                                            $cv             = $row['cv'];
                                            $job_id         = $row['job_id'];
                                            $i++;
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <?php
                                                    if (empty($image)) {
                                                    ?>
                                                        <img src="images/default.webp" alt="" class="avatar-img full-img">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img src="images/users/<?php echo $image; ?>" alt="" class="avatar-img full-img">
                                                    <?php
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <!-- mentor -->
                                                    <?php
                                                    $job_post = $job_id;
                                                    $sql = "SELECT * FROM jobs WHERE job_id = '$job_post'";
                                                    $jobs = mysqli_query($db, $sql);

                                                    $all_jobs   = mysqli_fetch_assoc($jobs);
                                                    $job_id     = $all_jobs['job_id'];
                                                    $job_name   = $all_jobs['job_name'];
                                                    echo $job_name;
                                                    ?>
                                                </td>
                                                <td><?php echo $fullname; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $phone; ?></td>
                                                <td><?php echo $address; ?></td>
                                                <td>
                                                    <?php
                                                    if ($gender == 1) {
                                                        echo "Male";
                                                    } else {
                                                        echo "Female";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (empty($cv)) {
                                                        echo "Cv not found";
                                                    } else {
                                                    ?>
                                                        <img src="images/cv/<?php echo $cv; ?>" alt="" class="avatar-img cv-img">
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                                <!-- diff -->
                                <div>
                                    <!-- <button class="modal-btn">Close</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
} else if ($do == "Add") {
?>
    <section class="content newjob">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Apply For A New Job</h3>
                        </div>
                        <!-- /.card-header -->

                        <?php
                        $sql = "SELECT * FROM users WHERE id = $_SESSION[id]";
                        $all_users = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($all_users)) {
                            $id         = $row['id'];
                            $fullname   = $row['fullname'];
                            $username   = $row['username'];
                            $email      = $row['email'];
                            $phone      = $row['phone'];
                            $address    = $row['address'];
                            $role       = $row['role'];
                        }
                        ?>
                        <div class="card-body">
                            <form action="apply.php?do=Insert" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6">
                                        <!-- <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $username; ?>" readonly>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" autocomplete="off" value="<?php echo $fullname ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $email ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" autocomplete="off" value="<?php echo $phone ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" cols="10" rows="4" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address" autocomplete="off" value="<?php echo $address ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Gender [Male/Female]</label>
                                            <input type="text" class="form-control" name="gender" value="<?php
                                                                                                            if ($role == 1) {
                                                                                                                echo "Male";
                                                                                                            } else {
                                                                                                                echo "Female";
                                                                                                            }
                                                                                                            ?>" readonly>
                                            <!-- <select class="form-control" name="gender">
                                                <option value="0">Please Select Your Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="">Upload User Avatar Image</label>
                                            <input type="file" class="form-control" name="image" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Upload CV/Resume Image</label>
                                            <input type="file" class="form-control" name="cv" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="job" value="<?php echo $job_id; ?>">
                                            <input type="submit" class="btn btn-primary mt-3 subbb" name="apply" value="Apply For Job">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} else if ($do == "Insert") {

    if (isset($_POST['apply'])) {
        $username       = $_POST['username'];
        $fullname       = $_POST['fullname'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];
        $description    = $_POST['description'];
        $address        = $_POST['address'];
        $gender         = $_POST['gender'];
        $job_id         = $_POST['job'];

        $image          = $_FILES['image']['name'];
        $image_tmp      = $_FILES['image']['tmp_name'];
        $cv             = $_FILES['cv']['name'];
        $cv_tmp         = $_FILES['cv']['tmp_name'];

        $random         = rand(0, 10000000);
        $image_file     = $random . $image;
        $cv_file        = $random . $cv;


        move_uploaded_file($image_tmp, "images/users/" . $image_file);
        move_uploaded_file($cv_tmp, "images/cv/" . $cv_file);

        $sql = "INSERT INTO apply(username, fullname, email, phone, description, address, gender, image, cv, job_id) VALUES('$username','$fullname','$email','$phone','$description','$address','$gender ','$image_file','$cv_file','$job_id')";

        $apply_job = mysqli_query($db, $sql);

        if ($apply_job) {
            //header("Location: index.php?do=Add");
            header("Location: dashboard.php");
        } else {
            die("Query Failed" . mysqli_error($db));
        }
    }
} else if ($do == "Edit") {
    if(isset($_GET['id'])) {
        $the_user_id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = '$the_user_id'";
        $the_user = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($the_user)) {
            $edit_id    = $row['id'];
            $fullname   = $row['fullname'];
            $username   = $row['username'];
            $email      = $row['email'];
            $phone      = $row['phone'];
            $address    = $row['address'];
            $role       = $row['role'];
            $image      = $row['image'];
            ?>
            <section class="content newjob">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Edit User Information</h3>
                                </div>


                                <div class="card-body">
                            <form action="apply.php?do=Insert" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $username;?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" autocomplete="off" value="<?php echo $fullname ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $email ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" autocomplete="off" value="<?php echo $phone ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address" autocomplete="off" value="<?php echo $address ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">                                   
                                        <div class="form-group">
                                            <label for="">Gender [Male/Female]</label>
                                            <select class="form-control" name="gender">
                                                <option value="0">Please Select Your Gender</option>
                                                <option value="1" <?php if($role == 1) {echo "selected";};?>>Male</option>
                                                <option value="2" <?php if($role == 2) {echo "selected";};?>>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Enter Your New Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" class="form-control" name="repassword" autocomplete="off" placeholder="Retype Your New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Upload User Avatar Image</label>
                                            <?php
                                                if(empty($image)) {
                                                    ?>
                                                        <img src="images/users/default.webp" alt="" style="width: 75px; display:block;">
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                        <img src="images/users/<?php echo $image;?>" alt="" style="width: 75px; display:block;">
                                                    <?php
                                                }
                                            ?>
                                            <input type="file" class="form-control" name="image" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <!-- <input type="hidden" name="job" value="<?php echo $job_id; ?>"> -->

                                            <input type="hidden" name="update" value="<?php echo $edit_id;?>">
                                            <input type="submit" class="btn btn-primary mt-3 subbb" name="save" value="Update Info">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
} else if ($do == "Update") {
    if(isset($_POST['update'])) {
        $the_update_id  = $_POST['update'];
        $fullname       = $_POST['fullname'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];
        $password       = $_POST['password'];
        $repassword       = $_POST['repassword'];
        $description    = $_POST['description'];
        $address        = $_POST['address'];
        $gender         = $_POST['gender'];
        $job_id         = $_POST['job'];

        $image          = $_FILES['image']['name'];
        $image_tmp      = $_FILES['image']['tmp_name'];


        //for password encryption 

        if(!empty($password)) {
            if($password == $repassword) {
                $hassedPass = sha1($password);
                
                $sql = "UPDATE users SET password = '$hassedPass' WHERE id = '$the_update_id'";
                $update_pass = mysqli_query($db, $sql);
            }
        }


        //for image

        // if(!empty($image)) {
            
        // }

    }
} else if ($do == "Delete") {
    echo "Delete Here";
}
?>

<?php include "include/footer.php" ?>