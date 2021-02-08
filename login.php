<?php include('header.php') ?>

<section id="hero-4" class="bg-fixed hero-section division">
	<div class="container">
        <h3 class="h3-sm steelblue-color text-center mb-4">Log In</h3>
        <div id="hero-section-form" class="text-center mb-40">
            <form method="POST" class="row g-3">
            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-blue white-color" id="basic-addon1">Phone</span>
                </div>
                <input required type="number" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="mobile">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-blue white-color" id="basic-addon1">Password</span>
                </div>
                <input required type="password" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="password">
              </div>
              <div class="col-12 text-center mt-5 mb-2">
                <button type="submit" class="btn btn-orange btn-md btn-tra-black blue-hover" style="width: 50%;" name="login_form">Login</button>
              </div>
            </div>
            </form> 
		    </div>
  </div>
</section>

 <?php
    if (isset($_POST["login_form"])) {

        $phone = $_POST["mobile"];
        $pass = $_POST["password"];

        if ($phone == 11111){

          $sql = "SELECT * FROM admin WHERE phone='".$phone."' and password='".$pass."'";

          $res = mysqli_query($con,$sql);

          if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            session_start();
            $_SESSION['adminname'] =$name;
            redirect('Admin/index.php'); 
          }
          else{
            echo "<script>alert('Invalid Admin Phone/Password')</script>";
          }
        }
        else if ($phone == 22222)
        {

          $sql = "SELECT * FROM employee WHERE password='".$pass."'";
          $res = mysqli_query($con,$sql);
         
          if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['employee'] = "employee";
            $_SESSION['name'] = $row['name'];
            redirect('employee/emp_search.php');

          }else{
            echo "<script>alert('Invalid Employee Phone/Password')</script>";
          }


        }
        else{
        
        $sql = "SELECT * FROM registration WHERE phone='" . $phone . "'
        AND password='" . $pass . "'";

        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            $user = $row['Name'];
            $phone = $row['Phone'];
            session_start();
            $_SESSION["username"] = $user;
            $_SESSION["phone"] = $phone;
            redirect("index.php");

        }else{
            echo "<script>alert('Invalid User Phone/Password')</script>";
        }
    }
  }

  include('footer.php')
    ?>
