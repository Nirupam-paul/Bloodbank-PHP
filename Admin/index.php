<?php
include('admin_header.php');

# Total Registration
$sql_registration = "SELECT * FROM registration";
$res_registration = mysqli_query($con,$sql_registration);
$res_reg_count = mysqli_num_rows($res_registration);

# Total Camps
$sql_camps = "SELECT * FROM camps";
$res_camps = mysqli_query($con,$sql_camps);
$res_camps_count = mysqli_num_rows($res_camps);

# Total Blood Request
$sql_blood_req = "SELECT * FROM request WHERE Status = 'Accepted'";
$res_blood_req = mysqli_query($con,$sql_blood_req);
$res_blood_req_count = mysqli_num_rows($res_blood_req);

# Total Blood Donation
$sql_blood_dona = "SELECT * FROM donation";
$res_blood_dona = mysqli_query($con,$sql_blood_dona);
$res_blood_dona_count = mysqli_num_rows($res_blood_dona);

# Blood Group
$sql_bg_group = "SELECT * FROM blood_stock";
$res_bg_group = mysqli_query($con,$sql_bg_group);
$res_bg_group_count = mysqli_num_rows($res_bg_group);

# Our Camps
$sql_camps = "SELECT * FROM camps";
$res_camps = mysqli_query($con,$sql_camps);
$res_camps_count = mysqli_num_rows($res_camps);

?>

<div class="container">
<br>
    <div class="card bg-dark">
    <div class="card-text " style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
        <span>DASHBOARD<span>
    </div>
    </div>
<br>
    <div class="row" style="color: white">
        <div class="col-sm-6">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Registered Users</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color: white ">
                        <span><?php echo $res_reg_count ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Camps organised</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color: white">
                        <span><?php echo $res_camps_count ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-5 mb-5">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Blood Requests</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color: white">
                        <span><?php echo $res_blood_req_count ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-5 mb-5">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Blood Donation</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color: white">
                        <span><?php echo $res_blood_dona_count ?><span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if ($res_bg_group_count > 0) { ?>

<div class="container">
<div class="card bg-dark">
    <div class="card-text " style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
        <span>Blood group availability!!<span>
    </div>
    </div>
    <?php $row_bg_group = mysqli_fetch_assoc($res_bg_group); ?>
    <div class="row" style="color: white;">
        <div class="col-sm-3 mt-3">
            <div class="card bg-danger ">
                <div class="card-body text-center">
                    <h5 class="card-title">A+</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white;">
                        <span><?php echo $row_bg_group['A+'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">A-</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['A-'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">B+</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['B+'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">B-</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['B-'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3 mb-5">
            <div class="card bg-danger ">
                <div class="card-body text-center">
                    <h5 class="card-title">AB+</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['AB+'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3 mb-5">
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">AB-</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['AB-'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3 mb-5">
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">O+</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['O+'] ?><span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-3 mb-5">
            <div class="card bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">O-</h5>
                    <hr>
                    <div class="card-text" style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
                        <span><?php echo $row_bg_group['O-'] ?><span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
 }

 
if($res_camps_count > 0){ ?>

<div class="container">
    <div class="card  bg-dark" >
    <div class="card-text " style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; color:white">
        <span>Camps Organized By Us<span>
    </div>
    </div>
    <br>
    <div class="row">
       <?php while( $row_camps = mysqli_fetch_assoc($res_camps)) {  ?>
        
        <div class="col-sm-6 ">
        <div class="card  mt-2 bg-danger " style="color: white">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold; font-size: 2rem; display: block; line-height: 1; margin: 1rem auto; color:white"><?php echo $row_camps['camp_title'] ?></h5>
                <h6 class="card-subtitle mb-2 ">Sponsored by: <?php echo $row_camps['organized_by'] ?></h6>
                <hr>
                <p class="card-text" style="color: white">Location: <?php echo $row_camps['city'],",",$row_camps['state'] ?></p>
                <p class="card-text" style="color: white">From: <?php echo $row_camps['from_date'] ?></p>
                <p class="card-text" style="color: white">To: <?php echo $row_camps['to_date'] ?></p> 
            </div>
        </div>
    </div>
 <?php
       }
 }
 
?>
</div>
</div>
<br>
<?php
include('admin_footer.php');
?>