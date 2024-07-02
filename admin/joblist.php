<?php include "include/header.php"; ?>
<?php include "include/db.php"; ?>

</div>
</div>

<section class="content contents">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">New Job List</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Title</label>
                                <input type="text" class="form-control" autocomplete="off" required="required" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Desc</label>
                                <textarea class="form-control" cols="100" rows="4" name="desc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Salary</label>
                                <input type="text" class="form-control" autocomplete="off" required="required" name="salary">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Status [Temporary/Permanent]</label>
                                <select class="form-control" name="status">
                                    <option value="0">Temporary</option>
                                    <option value="1">Internship</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm mt-3 subb" name="submit" value="Add New Job">
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $name       = $_POST['name'];
                            $desc       = $_POST['desc'];
                            $salary     = $_POST['salary'];
                            $status     = $_POST['status'];

                            $sql = "INSERT INTO jobs(job_name, job_desc, job_salary, job_status) VALUES('$name','$desc','$salary','$status')";
                            $add_job = mysqli_query($db, $sql);

                            if ($add_job) {
                                header("Location: dashboard.php");
                            } else {
                                die("Query Failed" . mysqli_error($db));
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include "include/footer.php" ?>