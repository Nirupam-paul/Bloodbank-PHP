<?php
include('header.php');
include('session_auth.php');
$bg_stock_row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM blood_stock"));
?>


<div id="breadcrumb" class="division">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class=" breadcrumb-holder">

					<!-- Breadcrumb Nav -->
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Requset</li>
						</ol>
					</nav>

					<!-- Title -->
					<h4 class="h4-sm steelblue-color">Request</h4>

				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div>

<div id="appointment-page" class="wide-60 appointment-page-section division" style="background-color: #DBF1FF;">
	<div class="container">
		<div class="row">


			<!-- SERVICE DETAILS -->
			<div class="col-lg-8">
				<div class="txt-block pr-30">

					<!-- Title -->
					<h3 class="h3-md steelblue-color text-center">Request Here</h3>

					<!-- APPOINTMENT FORM -->
					<div id="appointment-form-holder" class="text-center">

						<form method="POST">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text bg-blue white-color" for="inputGroupSelect01">BloodGroup</label>
								</div>
								<select class="custom-select" id="inputGroupSelect01" name="bggroup">
									<option value="A+" selected>A+ <?php echo "( ".$bg_stock_row['A+']." unit )"?></option>
									<option value="A-">A- <?php echo "( ".$bg_stock_row['A-']." unit )"?></option>
									<option value="B+">B+ <?php echo "( ".$bg_stock_row['B+']." unit )"?></option>
									<option value="B-">B- <?php echo "( ".$bg_stock_row['B-']." unit )"?></option>
									<option value="AB+">AB+ <?php echo "( ".$bg_stock_row['AB+']." unit )"?></option>
									<option value="AB-">AB- <?php echo "( ".$bg_stock_row['AB-']." unit )"?></option>
									<option value="O+">O+ <?php echo "( ".$bg_stock_row['O+']." unit )"?></option>
									<option value="O-">O- <?php echo "( ".$bg_stock_row['O-']." unit )"?></option>
								</select>
							</div>
							<div class="input-group mb-3" style="padding-top: 15px;">
								<div class="input-group-prepend">
									<span class="input-group-text bg-blue white-color" id="basic-addon1">Date</span>
								</div>
								<input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="reqdate">
							</div>
							<div class="input-group" style="padding-top: 15px;">
								<div class="input-group-prepend">
									<span class="input-group-text bg-blue white-color">Enter Details</span>
								</div>
								<textarea class="form-control" aria-label="With textarea" name="detail"></textarea>
							</div>
							<div class="text-center" style="padding-top: 30px;">
								<button type="submit" class="btn btn-orange btn-sm btn-tra-black blue-hover" name="request_submit" style="margin: 10px; width: 30%;">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div> <!-- END SERVICE DETAILS -->


			<!-- SIDEBAR -->
			<aside id="sidebar" class="col-lg-4">


				<!-- TEXT WIDGET -->
				<div id="txt-widget" class="sidebar-div mb-50">

					<!-- Title -->
					<h5 class="h5-sm steelblue-color">The Heart Of Clinic</h5>

					<!-- Head of Clinic -->
					<div class="txt-widget-unit mb-15 clearfix d-flex align-items-center">

						<!-- Avatar -->
						<div class="txt-widget-avatar">
							<img src="images/head-of-clinic.jpg" alt="testimonial-avatar">
						</div>

						<!-- Data -->
						<div class="txt-widget-data">
							<h5 class="h5-md steelblue-color">Dr. Jonathan Barnes</h5>
							<span>Chief Medical Officer, Founder</span>
							<p class="blue-color">1-800-1234-567</p>
						</div>

					</div>
					<p class="p-sm">An enim nullam tempor sapien at gravida donec pretium ipsum porta justo
						integer at odiovelna vitae auctor integer congue magna purus
					</p>
					<a href="about.html" class="btn btn-blue blue-hover">Learn More</a>

				</div>
			</aside>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div>



<?php

if (isset($_POST['request_submit'])) {
	$blood_group = $_POST['bggroup'];
	$request_date = $_POST['reqdate'];
	$detail = $_POST['detail'];
	//Check Blood Stock
	$blood_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM blood_stock"));
	if ($blood_row[$blood_group] < 1) {
		display_msg("Sorry we have ".$blood_row[$blood_group]." unit of ".$blood_group." blood");
	} else {
		if (isset($_SESSION['phone'])) {
			$phone = $_SESSION['phone'];
		}

		$sql = "SELECT * FROM registration WHERE phone='" . $phone . "'";

		$res = mysqli_query($con, $sql);

		if (mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_assoc($res);
			$name = $row['Name'];
			$gender = $row['Gender'];
			$age = $row['Age'];
			$email = $row['email'];

			$sql = "INSERT INTO request(name,age,gender,mobile,email,bloodgroup,requireddate,details) values ('" . $name . "','" . $age . "','" . $gender . "','" . $phone . "','" . $email . "','" . $blood_group . "','" . $request_date . "','" . $detail . "')";
			$n = mysqli_query($con, $sql);
			if ($n == 1) {
				echo "<script> alert('Request accepted') </script>";
			}
		} else {
			echo "<script>alert('Server Failed')</script>";
		}
	}
}

include('footer.php');
	?>