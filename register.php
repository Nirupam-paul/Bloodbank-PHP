<?php 
include('header.php'); 
?>



<section id="hero-4" class="bg-fixed hero-section division">
	<div class="container">
        <h3 class="h3-sm steelblue-color text-center">Register Here</h3>
        <div id="hero-section-form" class="text-center mb-40">
            <form method="POST" class="row g-3" enctype="multipart/form-data">
                            <div class="col-md-6 mt-3">
                                <input required type="text" style="height:50px;" class="form-control" id="inputEmail4" name="name" placeholder="Enter Name*">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input required type="number" style="height:50px;" class="form-control" id="inputPassword4" name="age" placeholder="Enter Age*">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input required type="email" style="height:50px;" class="form-control" id="inputEmail4" name="email" placeholder="Enter Email*">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input required type="number" style="height:50px;" class="form-control" id="inputPassword4" name="phone" placeholder="Enter Phone number*">
                            </div>
                            <div class="col-md-6 mt-3"> 
                                <select required id="inputState" style="height:50px; 
                                    width:100%; border:1px solid #ced4da;
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                    color: #495057;
                                    border-radius:.25rem;"
                                    class="form-select" name="gender">
                                    <option >Gender*</option>
                                    <option >Male</option>
                                    <option>Female</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <select required id="inputState" style="height:50px; 
                                    width:100%; border:1px solid #ced4da;
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                    color: #495057;
                                    border-radius:.25rem;" 
                                    class="form-select" name="blood">
                                    <option >BloodGroup*</option>
                                    <option >A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <input required type="password" style="height:50px;" class="form-control" id="inputAddress" name="password" placeholder="Password">
                            </div>
                            <div class="col-6 mt-3">
                                <input required type="password" style="height:50px;" class="form-control" id="inputAddress" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="col-12 mt-3 custom-file ml-3">
                                <input required type="file" style="height:50px;" class="custom-file-input " id="customFile" name="profile_pic">
                                <label class="custom-file-label" for="customFile">Choose File</label>
                            </div>
                            <div class="col-12 text-center mt-5 mb-5">
                                <button type="submit" class="btn btn-orange btn-md btn-tra-black blue-hover" style="width: 50%;" name="register_submit">Register</button>
                            </div>
                        </form> 
		</div>
    </div>
</section>

    <?php
    if (isset($_POST["register_submit"])) {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $blood = $_POST["blood"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $cnfpass = $_POST["confirm_password"];
        $profile_pic = $_FILES['profile_pic']['name'];
        $profile_pic_name = $phone."_".$profile_pic;
        // Move Uploaded Profile Pic
        $dis = move_uploaded_file($_FILES['profile_pic']['tmp_name'],SERVER_USER_PROFILE_IMAGE.$profile_pic_name);
        if ($pass === $cnfpass) {
            //Check Duplicate Values
            $check_phone = mysqli_num_rows(mysqli_query($con, "SELECT Phone FROM registration WHERE Phone='$phone'"));

            $check_email = mysqli_num_rows(mysqli_query($con, "SELECT email FROM registration WHERE email='$email'"));

            if ($check_phone > 0) {
                echo "<script>alert('Phone number already registered')</script>";
                redirect('register.php');
            } else if ($check_email > 0) {
                echo "<script>alert('Email Id already registered')</script>";
                redirect('register.php');
            } else {

                $query = "INSERT INTO registration (Name,Age,Gender,Phone,profile_pic,email,blood_group,password) VALUES ('" . $name . "','" . $age . "','" . $gender . "','" . $phone . "','".$profile_pic_name."','" . $email . "','" . $blood . "','" . $pass . "')";
                $n = mysqli_query($con, $query);
                if ($n == 1) {
                    redirect('login.php');
                }
            }
        } else {
            echo "<script>alert('Password didnot match')</script>";
        }
    }
    include('footer.php');
    ?>