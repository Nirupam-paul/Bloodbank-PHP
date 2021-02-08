<?php 
include('header.php'); 
?>



<section id="hero-4" class="bg-fixed hero-section division">
	<div class="container">
        <h3 class="h3-sm steelblue-color text-center">Register Here</h3>
        <div id="hero-section-form" class="text-center mb-40">
            <form method="POST" class="row g-3">
                            <div class="col-md-6 mt-3">
                                <input type="text" style="height:50px;" class="form-control" id="inputEmail4" name="name" placeholder="Your Name*">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input type="number" style="height:50px;" class="form-control" id="inputPassword4" name="age" placeholder="Your Age*">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input type="email" style="height:50px;" class="form-control" id="inputEmail4" name="email" placeholder="Your Email*">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input type="number" style="height:50px;" class="form-control" id="inputPassword4" name="phone" placeholder="Your Phonenumber*">
                            </div>
                            <div class="col-md-6 mt-3"> 
                                <select id="inputState" style="height:50px; 
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
                                <select id="inputState" style="height:50px; 
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
                                <input type="password" style="height:50px;" class="form-control" id="inputAddress" name="password" placeholder="Password">
                            </div>
                            <div class="col-6 mt-3">
                                <input type="password" style="height:50px;" class="form-control" id="inputAddress" name="confirm_password" placeholder="Password">
                            </div>
                            <div class="col-12 text-center mt-5 mb-5">
                                <button type="submit" class="btn btn-orange btn-md btn-tra-black blue-hover" style="width: 50%;" name="employee_register_submit">Register</button>
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

                $query = "INSERT INTO registration (Name,Age,Gender,Phone,email,blood_group,password) VALUES ('" . $name . "','" . $age . "','" . $gender . "','" . $phone . "','" . $email . "','" . $blood . "','" . $pass . "')";
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