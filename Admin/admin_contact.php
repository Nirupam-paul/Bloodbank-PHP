<?php
include('admin_header.php');

# Fetch All Status Pending From Contact
$sql_pending = "SELECT * FROM contact WHERE status='Pending'";
$res_pending = mysqli_query($con,$sql_pending);
$res_pending_count = mysqli_num_rows($res_pending);

# Fetch All Status Pending From Contact
$sql_success = "SELECT * FROM contact WHERE status='Contact Successful'";
$res_success = mysqli_query($con,$sql_success);
$res_success_count = mysqli_num_rows($res_success);


# Status Change Request
if(isset($_POST['status_change'])){
    $contact_id = $_POST['contact_id'];
    $sql_status_chg = "UPDATE contact SET status = 'Contact Successful' WHERE contact_id='".$contact_id."'";
    $res_status_chg = mysqli_query($con,$sql_status_chg);
    if($res_status_chg == False){
        echo "<script>alert('Sorry! Something went wrong')</script>";
    } 
    else{
        redirect('admin_contact.php');
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
                Contact
              </li>
            </ol>
          </nav>
          <h4 class="h4-sm steelblue-color">CONTACTS</h4>
        </div>
      </div>
    </div>
    <!-- End row -->
  </div>
  <!-- End container -->
</div>

<div id="pricing-2-page" class="wide-60 blog-page-section division">
    <div class="container">
        <div class="row ">
            <!-- PRICING-2 HOLDER -->
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="txt-block pr-30">
                    <!-- Title -->
                    <h3 class="h3-md steelblue-color text-center">Pending Contact</h3>
                    <?php  if($res_pending_count > 0) { ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Contact Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Contact user</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row_pending = mysqli_fetch_assoc($res_pending)) { ?>
                                <tr>
                                    <td><?php echo $row_pending['contact_id'] ?></td>
                                    <td><?php echo $row_pending['name'] ?></td>
                                    <td><?php echo $row_pending['phone'] ?></td>
                                    <td><?php echo $row_pending['email'] ?></td>
                                    <td><?php echo $row_pending['subject'] ?></td>
                                    <td><?php echo $row_pending['description'] ?></td>
                                    <td><?php echo $row_pending['status'] ?></td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="contact_id" value="<?php echo $row_pending['contact_id'] ?>">
                                            <button class="btn btn-sm btn-tra-black blue-hover" type="submit" name="status_change">Contact</button>
                                        </form>
                                    </td>
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
                                    <h3 class="h3-md steelblue-color text-center mt-1 mb-1 p-0">No Record Found!</h3>
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
                    <h3 class="h3-md steelblue-color text-center">Successful Contacts</h3>
                    <?php  if($res_success_count > 0) { ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
                            <thead>
                                <th scope="col">Contact Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                            </thead>
                            <tbody>
                            <?php while($row_success= mysqli_fetch_assoc($res_success)) { ?>
                                <tr>
                                <td><?php echo $row_success['contact_id'] ?></td>
                                <td><?php echo $row_success['name'] ?></td>
                                <td><?php echo $row_success['phone'] ?></td>
                                <td><?php echo $row_success['email'] ?></td>
                                <td><?php echo $row_success['subject'] ?></td>
                                <td><?php echo $row_success['description'] ?></td>
                                <td><?php echo $row_success['status'] ?></td>
                                </tr>
                                <?php 
                            }
                                ?>
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
        
    </div>
</div>

<?php
include('admin_footer.php');
?>