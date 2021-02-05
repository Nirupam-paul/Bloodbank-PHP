<?php
include('admin_header.php');


# Pending Blood Request
$sql_pending = "SELECT * FROM request WHERE Status ='Pending'";
$res_pending = mysqli_query($con,$sql_pending);
$blood_request_pending = mysqli_num_rows($res_pending);

# Processing Blood Request
$sql_processing = "SELECT * FROM request WHERE Status ='Processing'";
$res_processing = mysqli_query($con,$sql_processing);
$blood_request_processing = mysqli_num_rows($res_processing);

# Accepted Blood Request
$sql_accepted = "SELECT * FROM request WHERE Status ='Accepted'";
$res_accepted = mysqli_query($con,$sql_accepted);
$blood_request_accepted = mysqli_num_rows($res_accepted);


#If Processing Button is clicked
if(isset($_POST['submit_processing'])){

  $req_id = $_POST['submit_processing'];
  $bg_group = $_POST['bg_group'];
  
   # Update Blood Stock
   $sql_blood = "SELECT * FROM blood_stock";
   $res_blood = mysqli_query($con,$sql_blood);
   $row_blood = mysqli_fetch_assoc($res_blood);

   if( $row_blood[$bg_group] > 0)
   {
        $add_blood = $row_blood[$bg_group] - 1;

        $sql_blood_update = "UPDATE `blood_stock` SET `$bg_group`= $add_blood";
        $res_blood_update = mysqli_query($con,$sql_blood_update);
        
        # Update Request
        $sql = "UPDATE request SET Status = 'Processing' WHERE req_id = '".$req_id."'";
        $res = mysqli_query($con,$sql);
        
        if ($res == False){
     
           echo '<script>alert("Server Failed")</script>';
     
        }
        else{
         redirect('admin_blood_request.php');
       }
   }
   else{

        echo '<script>alert("Blood Not Available")</script>';
   }
 
  
}

# If Accepted Button is clicked
elseif(isset($_POST['submit_accepted'])){

   $req_id =  $_POST["submit_accepted"];
   $sql = "UPDATE request SET Status = 'Accepted' WHERE req_id = '".$req_id."'";
   $res = mysqli_query($con,$sql);
   if($res == False ){

        echo '<script>alert("Server Failed")</script>';
   }
   else{
    redirect('admin_blood_request.php');
   }
}

# If Pending Button is clicked
elseif(isset($_POST['submit_pending'])){

    $req_id =  $_POST["submit_pending"];
    $sql = "UPDATE request SET Status = 'Pending' WHERE req_id = '".$req_id."'";
    $res = mysqli_query($con,$sql);
    if($res == False ){
        '<script>alert("Server Failed")</script>';
    }
    else{

        redirect('admin_blood_request.php');
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
                Requests
              </li>
            </ol>
          </nav>
          <h4 class="h4-sm steelblue-color">Request Manager</h4>
        </div>
      </div>
    </div>
    <!-- End row -->
  </div>
  <!-- End container -->
</div>

<div id="pricing-2-page" class="wide-60 blog-page-section division">
    <div class="container-fluid">
        <div class="row">
            <!-- PRICING-2 HOLDER -->
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="txt-block pr-30">
                    <!-- Title -->
                    <h3 class="h3-md steelblue-color text-center">Request Information</h3>

                    <!-- Plan Title  -->
                    <h5 class="h5-md steelblue-color">
                        Pending Request
                    </h5>
                    <?php if( $blood_request_pending > 0){ ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
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
                                <?php while($row_pending = mysqli_fetch_assoc($res_pending)){ ?>
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
                                    <input type="hidden" name="bg_group" value="<?php echo $row_pending['bloodgroup'] ?>" >
                                    <td>
                                        <button type="submit"  name="submit_processing" value="<?php echo $row_pending['req_id'] ?>" class="btn btn-sm btn-tra-black blue-hover">
                                            Processing
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                        else{
                            ?>
                            <section id="pricing-1" class="bg-lightgrey wide-60 pricing-section division">
                                    <h3 class="h3-md steelblue-color text-center mt-1 mb-1 p-0">No Blood Request Pending Found</h3>
                            </section>
                            
                        <?php   
                        }
                        ?>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- PRICING-2 HOLDER -->
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="txt-block pr-30">
                    <br><br>

                    <!-- Plan Title  -->
                    <h5 class="h5-md steelblue-color">
                        Processing Request
                    </h5>
                    <?php if( $blood_request_processing > 0){ ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
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
                                <?php while($row_processing = mysqli_fetch_assoc($res_processing)){ ?>
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
                                    <form method="POST"> 
                                    <td>
                                        <button type="submit"  name="submit_accepted" value="<?php echo $row_processing['req_id'] ?>" class="btn btn-sm btn-tra-black blue-hover">
                                            Accept
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                        else{
                            ?>
                            <section id="pricing-1" class="bg-lightgrey wide-60 pricing-section division">
                                    <h3 class="h3-md steelblue-color text-center mt-1 mb-1 p-0">No Blood Request Processing Found</h3>
                            </section>
                            
                        <?php   
                        }
                        ?>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- PRICING-2 HOLDER -->
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="txt-block pr-30">
                    <!-- Plan Title  -->
                    <h5 class="h5-md steelblue-color">
                        Accepted Request
                    </h5>
                    <?php if( $blood_request_accepted > 0){ ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
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
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php  while($row_accepted = mysqli_fetch_assoc($res_accepted)){ ?>
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
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                        else{
                            ?>
                            <section id="pricing-1" class="bg-lightgrey wide-60 pricing-section division">
                                    <h3 class="h3-md steelblue-color text-center mt-1 mb-1 p-0">No Blood Request Accepted Found</h3>
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