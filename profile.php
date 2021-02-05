<?php
include('header.php');

if(isset($_SESSION['phone'])){
    $phone = $_SESSION['phone'];
}

# User's Information

$sql = "SELECT * FROM registration WHERE phone='".$phone."'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
    $name = $row['Name'];
    $age = $row['Age'];
    $gender = $row['Gender'];
    $email = $row['email'];
    $blood_group = $row['blood_group'];
}
else{
    echo "<script>alert('Server Failed')</script>";
}

# Pending Blood Request
$sql_pending = "SELECT * FROM request WHERE Status ='Pending' AND mobile='".$phone."'";
$res_pending = mysqli_query($con,$sql_pending);
$blood_request_pending = mysqli_num_rows($res_pending);

# Processing Blood Request
$sql_processing = "SELECT * FROM request WHERE Status ='Processing' AND mobile='".$phone."'";
$res_processing = mysqli_query($con,$sql_processing);
$blood_request_processing = mysqli_num_rows($res_processing);

# Accepted Blood Request
$sql_accepted = "SELECT * FROM request WHERE Status ='Accepted' AND mobile='".$phone."'";
$res_accepted = mysqli_query($con,$sql_accepted);
$blood_request_accepted = mysqli_num_rows($res_accepted);

# Request Deleted
if(isset($_POST['submit_delete'])){
    
    $req_id = $_POST['submit_delete'];

    $sql_delete = "DELETE FROM request WHERE req_id='".$req_id."'";
    $res_delete = mysqli_query($con,$sql_delete);
    
    if($res_delete == False){

        echo "<script>alert('Request Deletion Failed')</script>";
    }
    else{
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
			</div>   <!-- End row -->	
		</div>	  <!-- End container -->
	</section><!-- END DOCTOR BREADCRUMBS -->
            
            <!-- DOCTOR-1 DETAILS -->
	<section id="doctor-1-details" class="doctor-details-section division" style="background-color: #DBF1FF;">
        <div class="container ">
		    <div class="row">
						<div class="col-md-4">
			 				<div class="doctor-photo mb-40">
			 					<img class="img-fluid" src="images/images-doctor-3.jpg" alt="User Image">
                                 
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
			 			</div>	<!-- END DOCTOR PHOTO -->


			 			<!-- DOCTOR'S BIO -->
						<div class="col-md-8">
							<div class="doctor-bio">
                            <h5 class="h5-md steelblue-color">My Request</h5>
                            <div class="pricing-table mb-40">								
									<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Request Id</th>
                                                <th scope="col">Requested BG</th>
                                                <th scope="col">Request Date</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Status</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
										     	<td>X-Ray</td>
										      	<td>From <span>$1325.00</span></td>
										    </tr>
                                            <tr>
                                                <th scope="row">2</th>
										      	<td>Magnetic Resonance Imaging</td>
										      	<td>From <span>$1435.00</span></td>
										    </tr>
                                            <tr>
                                                <th scope="row">3</th>
										      	<td>Computer Tomography</td>
										      	<td>From <span>$1315.00</span></td>
										    </tr>
                                            <tr>
                                                <th scope="row">4</th>
										      	<td>Laboratory Tests</td>
										      	<td>From <span>$890.00</span></td>
										    </tr>
                                            <tr><th scope="row">5</th>
										      	<td>Ultrasound Imaging</td>
										      	<td>From <span>$985.00</span></td>
										    </tr>
                                            <tr class="last-tr"><th scope="row">6</th>
										      	<td>Pregnancy Care Service</td>
										      	<td>From <span>$1130.00</span></td>
										    </tr>
                                        </tbody>
                                    </table>
                                </div>
							</div>
						</div>	<!-- END DOCTOR BIO -->


					</div>    <!-- End row -->	
				</div>	   <!-- End container -->
			</section><!-- END DOCTOR-1 DETAILS -->




    <div class="container">
    
    <div class="card ">
        <div class="card-text " style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; ">
            <span>Pending Request's<span>
        </div>
    </div>
    <div class="jumbotron pt-5">
        <?php if( $blood_request_pending > 0){ ?>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Request Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Requested BG</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Change Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                while($row_pending = mysqli_fetch_assoc($res_pending)){
                    ?>
                        <tr>
                        <td><?php echo $row_pending['req_id'] ?></td>
                        <td><?php echo $row_pending['name'] ?></td>
                        <td><?php echo $row_pending['age'] ?></td>
                        <td><?php echo $row_pending['gender'] ?></td>
                        <td><?php echo $row_pending['mobile'] ?></td>
                        <td><?php echo $row_pending['email'] ?></td>
                        <td><?php echo $row_pending['bloodgroup'] ?></td>
                        <td><?php echo $row_pending['requireddate'] ?></td>
                        <td><?php echo $row_pending['details'] ?></td>
                        <td><?php echo $row_pending['Status'] ?></td>
                        <form method="POST"> 
                        <td><button type="submit"  name="submit_delete" value="<?php echo $row_pending['req_id'] ?>" class="btn btn-info btn-sm">Delete Request</button></td>
                        </form>
                        </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>   
            <?php
            }
            else{
                ?>

                <h3 class="alert alert-warning">No Blood Request Pending Found</h3>

            <?php   
            }
            ?>
    </div>

    <div class="card ">
            <div class="card-text " style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; ">
                <span>Processing Request's<span>
            </div>
    </div>
    <div class="jumbotron pt-5">
        <div class="container">
        <?php if( $blood_request_processing > 0){ ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Request Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Blood Group Requested</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                while($row_processing = mysqli_fetch_assoc($res_processing)){
                    ?>
                    <tr>
                        <td><?php echo $row_processing['req_id'] ?></td>
                        <td><?php echo $row_processing['name'] ?></td>
                        <td><?php echo $row_processing['age'] ?></td>
                        <td><?php echo $row_processing['gender'] ?></td>
                        <td><?php echo $row_processing['mobile'] ?></td>
                        <td><?php echo $row_processing['email'] ?></td>
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
            }
            else{
                ?>
                <h3 class="alert alert-warning">No Blood Request Processing Found</h3>

            <?php   
            }
            ?>
        </div>
    </div>
    <div class="card ">
        <div class="card-text " style="font-weight: bold; font-size: 2.5rem; display: block; line-height: 1; margin: 1rem auto; ">
            <span>Accepted Request's<span>
        </div>
    </div>
    <div class="jumbotron pt-5">
        <div class="container">

        <?php if( $blood_request_accepted > 0){ ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Request Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Blood Group Requested</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row_accepted = mysqli_fetch_assoc($res_accepted)){
                        ?>
                            <tr>
                            <td><?php echo $row_accepted['req_id'] ?></td>
                            <td><?php echo $row_accepted['name'] ?></td>
                            <td><?php echo $row_accepted['age'] ?></td>
                            <td><?php echo $row_accepted['gender'] ?></td>
                            <td><?php echo $row_accepted['mobile'] ?></td>
                            <td><?php echo $row_accepted['email'] ?></td>
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
            }
            else{
                ?>

                <h3 class="alert alert-warning"> No Blood Request Accepted Found</h3>

            <?php   
            }
            ?>
        </div>
    </div>



</div>

<?php
include('footer.php');
?>