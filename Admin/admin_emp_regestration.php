<?php
include('admin_header.php');
if(isset($_POST['employee_register_submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bg = $_POST['blood'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $j_date = $_POST['j_date'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $password = $_POST['password'];

    $sql = "INSERT INTO employee(name,age,gender,bg,phone,email,j_date,designation,salary,password) VALUES('".$name."','".$age."','".$gender."','".$bg."','".$phone."','".$email."','".$j_date."','".$designation."','".$salary."','".$password."')";
    $res = mysqli_query($con,$sql);

    if($res == False){
        echo "<script>alert('Registration Failed')</script>";
    }
    else{
        echo "<script>alert('Successfull')</script>";
    }
}
?>

<div container>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card " style="margin-top: 25px;">
                    <div class="card-header text-center">
                        <h1 style="color: red;">Employee Registration</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="row g-3">
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
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="inputEmail4" name="j_date">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="inputPassword4" name="salary">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Designation</label>
                                <select name="designation" id="inputAddress" class="form-control">
                                    <option> Request Management</option>
                                    <option> Camps Management</option>
                                    <option> Donar Management</option>
                                    <option> Contact Management</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputAddress" name="password">
                            </div>
                            <div class="col-6" style="text-align: left;">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I accept all the Terms and Condition
                                </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-danger" style="width: 50%;" name="employee_register_submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php
include('admin_footer.php');
?>