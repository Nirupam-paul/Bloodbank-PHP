<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>

    <div container>
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card " style="margin-top: 25px;">
                    <div class="card-header text-center">
                        <h1 style="color: red;">Register Here </h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="row g-3" >
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Age</label>
                                <input type="number" class="form-control" id="inputPassword4" name="age">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Gender</label>
                                <select id="inputState" class="form-select" name="gender">
                                    <option selected>Male</option>
                                    <option>Female</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">BloodGroup</label>
                                <select id="inputState" class="form-select" name="blood">
                                    <option selected>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="inputPassword4" name="phone">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputAddress" name="password">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="inputAddress2" name="confirm_password">
                            </div>

                            <div class="col-12" style="text-align: left;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        I accept all the Terms and Condition
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-danger" style="width: 50%;" name="register_submit">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center ">
                        <p>Already a memeber ! <a href="login.php" style="color: red;">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include("databaseconnect.php");
    include('function.php');
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
    ?>
</body>

</html>