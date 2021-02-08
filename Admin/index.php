<?php
include('admin_header.php');
include('../constant.php');

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

    <div id="breadcrumb" class="division">
        <div class="container">
            <div class="row">						
                <div class="col">
                    <div class=" breadcrumb-holder">
                        <h2 class="h2-sm steelblue-color text-center">DASHBOARD</h2>
                    </div>
                </div>
            </div>  	
        </div>			
    </div>	

    <div id="statistic-1" class="bg-scroll statistic-section division ">
        <div class="container white-color">
            <span class="section-id text-center">Statistics</span>
                <div class="row">
                    <!-- STATISTIC BLOCK #1 -->
                    <div class="col-md-6 col-lg-3">					
                        <div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="0.4s">
                            <!-- Icon  -->
                            <span class="flaticon-016-doctor-1"></span>
                                <!-- Text -->
                                <h5 class="statistic-number"><span class="count-element"><?php echo $res_reg_count ?></span></h5>
                                <p class="txt-400">Total Registered Users</p>																			
                                                        
                        </div>								
                    </div>
                    <!-- STATISTIC BLOCK #2 -->
                    <div class="col-md-6 col-lg-3">								
                        <div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="0.6s">
                            <!-- Icon  -->
                            <span class="flaticon-129-hospital-1 "></span>
                                <!-- Text -->
                                <h5 class="statistic-number"><span class="count-element"><?php echo $res_camps_count ?></span></h5>	
                                <p class="txt-400">Total Camps organised</p>										
                        </div>							
                    </div>
                    <!-- STATISTIC BLOCK #3 -->
                    <div class="col-md-6 col-lg-3">						
                        <div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="0.8s">	
                            <!-- Icon  -->
                                <span class="flaticon-013-blood-donation-2 "></span>
                                <!-- Text -->
                                <h5 class="statistic-number"><span class="count-element"><?php echo $res_blood_req_count ?></span></h5>
                                <p class="txt-400">Total Blood Requests</p>									
                        </div>						
                    </div>
                    <!-- STATISTIC BLOCK #4 -->
                    <div class="col-md-6 col-lg-3">						
                        <div class="statistic-block icon-sm wow fadeInUp" data-wow-delay="1s">	
                            <!-- Icon  -->
                            <span class="flaticon-015-blood-donation-1 "></span>
                            <!-- Text -->	
                                <h5 class="statistic-number"><span class="count-element"><?php echo $res_blood_dona_count ?></span></h5>
                                <p class="txt-400">Total Blood Donation</p>		
                        </div>						
                    </div>
                </div>  <!-- End row -->
        </div>	 <!-- End container -->		
    </div>

<?php if ($res_bg_group_count > 0) { ?>

    <section id="services-2" class="bg-lightgrey wide-70 services-section division" style="background-color: #DBF1FF;">
				<div class="container">
					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title">		

							<!-- Title 	-->	
							<h3 class="h3-md steelblue-color">AVAILABILITY</h3>
							<!-- Text -->
							<p>In Units
							</p>
										
						</div> 
					</div>
                    <?php $row_bg_group = mysqli_fetch_assoc($res_bg_group); ?>
			 		<div class="row">
					<!-- SERVICE BOX #1 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">A+</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['A+'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #2 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">A-</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['A-'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #3 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">B+</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['B+'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #4 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">B-</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['B-'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #5 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">AB+</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['AB+'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #6 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">AB-</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['AB-'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #7 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">	
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color" style=" margin-top: -50px;">O+</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['O+'] ?></span></h5>
									
								</a>
							</div>							
						</div>


						<!-- SERVICE BOX #8 -->
						<div class="col-sm-6 col-lg-3">
							<div class="sbox-2 wow fadeInUp" data-wow-delay="0.5s">
								<a href="">		
								
									<!-- Icon  -->
									<div class="sbox-2-icon icon-xl">
										<span class="flaticon-094-blood-drop-1"></span><h5 class="h5-sm steelblue-color " style=" margin-top: -50px; hover{color:white;}">O-</h5>
									</div>
									<!-- Title -->
                                    <h5 class="statistic-number h5-sm sbox-2-title steelblue-color " style="margin-top: 50px;"><span class="count-element"><?php echo $row_bg_group['O-'] ?></span></h5>
									
								</a>
							</div>							
						</div>


			 		</div>	   <!-- End row -->		
                    <?php  } ?>

			 	</div>	   <!-- End container -->		
    </section>

<?php if($res_camps_count > 0){ ?>

    <section id="doctors-3" class="bg-lightgrey wide-60 doctors-section division">
		<div class="container">
            <h3 class="h3-md steelblue-color text-center mb-4" style="margin-top: -20px;">CAMPS</h3>
			<div class="row">
                <?php while( $row_camps = mysqli_fetch_assoc($res_camps)) {  ?>
				<div class="col-md-6 col-lg-6">
				    <div class="doctor-2">	
						<div class="hover-overlay"> 
							<img class="img-fluid" src="<?php echo DISPLAY_CAMP_IMAGE.$row_camps['image'] ?>" alt="Loading">	
						</div>		
					<div class="doctor-meta">
                        <h5 class="h5-xs blue-color"><?php echo $row_camps['camp_title'] ?></h5>
                        <div class="doctor-info">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Organized by: </td>
                                        <td><span><i class="fas fa-angle-double-right"></i> <?php echo $row_camps['organized_by'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><span><i class="fas fa-angle-double-right"></i> <?php echo $row_camps['city'],",",$row_camps['state'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>From:</td>
                                        <td><span><i class="fas fa-angle-double-right"></i> <?php echo $row_camps['from_date'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>To:</td>
                                        <td><span><i class="fas fa-angle-double-right"></i> <?php echo $row_camps['to_date'] ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>								
			</div>
                <?php
                    }
                }
                
                ?>
		</div>
	</section>

<?php
include('admin_footer.php');
?>