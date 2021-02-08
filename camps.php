<?php
include('header.php');
$sql="SELECT * FROM camps";
$res = mysqli_query($con,$sql);
$camp_res=mysqli_num_rows($res);
?>

    <?php 
    if($camp_res > 0) {
    ?>  
    
    
    <div id="breadcrumb" class="division">
				<div class="container">
					<div class="row">						
						<div class="col">
							<div class=" breadcrumb-holder">
								<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb">
								    	<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								    	<li class="breadcrumb-item active" aria-current="page">Camps</li>
								  	</ol>
								</nav>
								<h4 class="h4-sm steelblue-color">Camps Organized By Us</h4>

							</div>
						</div>
					</div> 	
				</div>	
			</div>


			<section id="doctors-3" class="bg-lightgrey wide-60 doctors-section division">
				<div class="container">
					<div class="row">
                    <?php while( $row = mysqli_fetch_assoc($res)) {  ?>
						<div class="col-md-6 col-lg-6">
							<div class="doctor-2">	
								<div class="hover-overlay"> 
									<img class="img-fluid" src="<?php echo DISPLAY_CAMP_IMAGE.$row['image'] ?>" alt="Loading">	
								</div>		
								<div class="doctor-meta">

									<h5 class="h5-xs blue-color"><?php echo $row['camp_title'] ?></h5>
                                    <div class="doctor-info">
									<table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Organized by: </td>
										      	<td><span><i class="fas fa-angle-double-right"></i> <?php echo $row['organized_by'] ?></span>
										      	</td>
										   	</tr>
                                            <tr>
                                                <td>Location</td>
										      	<td><span><i class="fas fa-angle-double-right"></i> <?php echo $row['city'],",",$row['state'] ?></span>
										      	</td>
										   	</tr>
                                            <tr>
                                                <td>From:</td>
										      	<td><span><i class="fas fa-angle-double-right"></i> <?php echo $row['from_date'] ?></span>
										      	</td>
										   	</tr>
                                            <tr>
                                                <td>To:</td>
										      	<td><span><i class="fas fa-angle-double-right"></i> <?php echo $row['to_date'] ?></span>
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
                        else
                        {
                        ?>
                        <h3 class="alert alert-warning">No Result Found</h3>
                        <?php
                        }
                        ?>	
					</div>	   
				</div>	
			</section>	



<?php
include('footer.php');
?>
