<?php
include('header.php');
include('session_auth.php');

if (isset($_SESSION['phone'])) {
    $phone = $_SESSION['phone'];
}

# User's Information

$sql = "SELECT * FROM registration WHERE phone='" . $phone . "'";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $name = $row['Name'];
    $age = $row['Age'];
    $gender = $row['Gender'];
    $email = $row['email'];
    $blood_group = $row['blood_group'];
    $image = $row['profile_pic'];
} else {
    echo "<script>alert('Server Failed')</script>";
}

# Pending Blood Request
$sql_pending = "SELECT * FROM request WHERE Status ='Pending' AND mobile='" . $phone . "'";
$res_pending = mysqli_query($con, $sql_pending);
$blood_request_pending = mysqli_num_rows($res_pending);

# Processing Blood Request
$sql_processing = "SELECT * FROM request WHERE Status ='Processing' AND mobile='" . $phone . "'";
$res_processing = mysqli_query($con, $sql_processing);
$blood_request_processing = mysqli_num_rows($res_processing);

# Accepted Blood Request
$sql_accepted = "SELECT * FROM request WHERE Status ='Accepted' AND mobile='" . $phone . "'";
$res_accepted = mysqli_query($con, $sql_accepted);
$blood_request_accepted = mysqli_num_rows($res_accepted);

# Request Deleted
if (isset($_POST['submit_delete'])) {

    $req_id = $_POST['submit_delete'];

    $sql_delete = "DELETE FROM request WHERE req_id='" . $req_id . "'";
    $res_delete = mysqli_query($con, $sql_delete);

    if ($res_delete == False) {

        echo "<script>alert('Request Deletion Failed')</script>";
    } else {
        redirect('profile.php');
    }
}
?>



<!-- DOCTOR BREADCRUMBS -->
<section id="doctor-breadcrumbs" class="bg-fixed doctor-details-section division">
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-5">
                <div class="doctor-data white-color">
                    <h2 class="h2-xs"><?php echo $name ?></h2>
                </div>
            </div>
        </div> <!-- End row -->
    </div> <!-- End container -->
</section><!-- END DOCTOR BREADCRUMBS -->

<!-- DOCTOR-1 DETAILS -->
<section id="doctor-1-details" class="doctor-details-section division" style="background-color: #DBF1FF;">
    <div class="container ">
        <div class="row">
            <div class="col-md-4">
                <div class="doctor-photo mb-40">
                    <img class="img-fluid" src="<?php echo DISPLAY_USER_PROFILE_IMAGE . $image ?>" alt="User Image">

                    <div class="doctor-info" style="background-color: #DBF1FF;">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Age</td>
                                    <td><span><i class="fas fa-angle-double-right"></i> <?php echo $age ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><span><i class="fas fa-angle-double-right"></i> <?php echo $gender ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><span><i class="fas fa-angle-double-right"></i> <?php echo $phone ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><span><i class="fas fa-angle-double-right"></i> <?php echo $email ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Blood Group</td>
                                    <td><span><i class="fas fa-angle-double-right"></i> <?php echo $blood_group ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div> <!-- END DOCTOR PHOTO -->

            <!--My Accepted Request-->
            <div class="col-md-8">
                <div class="doctor-bio">
                    <h5 class="h5-md steelblue-color">My Accepted Request</h5>
                    <div class="pricing-table mb-40">
                        <?php if ($blood_request_accepted > 0) { ?>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Request Id</th>
                                        <th scope="col">Blood Group Requested</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_accepted = mysqli_fetch_assoc($res_accepted)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row_accepted['req_id'] ?></td>
                                            <td><?php echo $row_accepted['bloodgroup'] ?></td>
                                            <td><?php echo $row_accepted['requireddate'] ?></td>
                                            <td><?php echo $row_accepted['details'] ?></td>
                                            <td><?php echo $row_accepted['Status'] ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        <?php
                        } else {
                        ?>

                            <h3 class="alert alert-warning"> No Blood Request Accepted Found</h3>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div> <!-- END My Accepted Request-->
        </div>

        <div class="row">
            <!-- My Pending Request -->
            <div class="col-md-6">
                <div class="doctor-bio">
                    <h5 class="h5-md steelblue-color">My Pending Request</h5>
                    <div class="pricing-table mb-40">
                        <?php if ($blood_request_pending > 0) { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Request Id</th>
                                        <th scope="col">Requested BG</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_pending = mysqli_fetch_assoc($res_pending)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row_pending['req_id'] ?></td>
                                            <td><?php echo $row_pending['bloodgroup'] ?></td>
                                            <td><?php echo $row_pending['requireddate'] ?></td>
                                            <td><?php echo $row_pending['details'] ?></td>
                                            <td>
                                            <form method="POST">
                                                <button type="submit" name="submit_delete" value="<?php echo $row_pending['req_id'] ?>" class="btn btn-danger btn-sm" style="background-color:red;">Delete Request</button>
                                            </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>

                            <h3 class="alert alert-warning">No Blood Request Pending Found</h3>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div> <!-- END My Pending Request -->

            <!-- My Processing Request -->
            <div class="col-md-6">
                <div class="doctor-bio">
                    <h5 class="h5-md steelblue-color">My Processing Request</h5>
                    <div class="pricing-table mb-40">
                        <?php if ($blood_request_processing > 0) { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Request Id</th>
                                        <th scope="col">Blood Group Requested</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_processing = mysqli_fetch_assoc($res_processing)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row_processing['req_id'] ?></td>
                                            <td><?php echo $row_processing['bloodgroup'] ?></td>
                                            <td><?php echo $row_processing['requireddate'] ?></td>
                                            <td><?php echo $row_processing['details'] ?></td>
                                            <td><?php echo $row_processing['Status'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        <?php
                        } else {
                        ?>
                            <h3 class="alert alert-warning">No Blood Request Processing Found</h3>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div> <!-- END My Processing Request -->

        </div>


    </div> <!-- End row -->
    </div> <!-- End container -->
</section><!-- END DOCTOR-1 DETAILS -->

<?php
include('footer.php');
?>