<?php
include('admin_header.php');

$sql_emp = "SELECT * FROM employee";
$res_emp = mysqli_query($con,$sql_emp);
$res_emp_count = mysqli_num_rows($res_emp);

if(isset($_POST['submit_salary'])){
    $salary = $_POST['salary_amt'];
    $emp_id = $_POST['submit_salary'];

    $sql_emp_chg = "UPDATE employee SET salary='".$salary."' WHERE emp_id='".$emp_id."'";
    $res_emp_chg = mysqli_query($con,$sql_emp_chg);

    if($res_emp_chg == False){
        echo "<script>alert('Failed To Update')</script>";
    }
    else{
        redirect('admin_employees_view.php');
    }
}

?>

<div id="breadcrumb" class="division">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="breadcrumb-holder">
          <!-- Breadcrumb Nav -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Employee 
              </li>
            </ol>
          </nav>
          <h4 class="h4-sm steelblue-color">Employee Manager</h4>
        </div>
      </div>
    </div>
    <!-- End row -->
  </div>
  <!-- End container -->
</div>

<div id="pricing-2-page" class="wide-60 blog-page-section division">
    <div class="container-fluid">
        <div class="row ml-5">
            <!-- PRICING-2 HOLDER -->
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="txt-block pr-30">
                    <!-- Title -->
                    <h3 class="h3-md steelblue-color text-center">Employee Information</h3>
                    <?php if( $res_emp_count > 0){ ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Employee Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Change Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row_pending = mysqli_fetch_assoc($res_emp)){ ?>
                                <tr>
                                    <tr>
                                        <td><?php echo $row_pending['emp_id'] ?></td>
                                        <td><?php echo $row_pending['name'] ?></td>
                                        <td><?php echo $row_pending['age'] ?></td>
                                        <td><?php echo $row_pending['gender'] ?></td>
                                        <td><?php echo $row_pending['bg'] ?></td>
                                        <td><?php echo $row_pending['phone'] ?></td>
                                        <td><?php echo $row_pending['email'] ?></td>
                                        <td><?php echo $row_pending['j_date'] ?></td>
                                        <td><?php echo $row_pending['designation'] ?></td>
                                        <td><?php echo $row_pending['salary'] ?></td>
                                        <form method="POST"> 
                                        <td>
                                            <div class="input-group mb-3">
                                                <input type="number" name="salary_amt" class="form-control" placeholder="Enter Salary" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button type="submit"  name="submit_salary" value="<?php echo $row_pending['emp_id'] ?>" class="btn btn-sm btn-tra-black blue-hover">Button</button>
                                                </div>
                                            </div>
                                        </td>
                                        </form>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    }
                    else{
                        ?>

                        <section id="pricing-1" class="bg-lightgrey wide-60 pricing-section division">
                                    <h3 class="h3-md steelblue-color text-center mt-1 mb-1 p-0">No Employee Found</h3>
                            </section>

                    <?php   
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('admin_footer.php');
?>