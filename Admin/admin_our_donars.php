<?php
include('admin_header.php');
$sql = "SELECT * FROM donation";
$res = mysqli_query($con,$sql);
$res_count = mysqli_num_rows($res);
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
                Our Donars
              </li>
            </ol>
          </nav>
          <h4 class="h4-sm steelblue-color">Our DONARS</h4>
        </div>
      </div>
    </div>
    <!-- End row -->
  </div>
  <!-- End container -->
</div>

<div id="pricing-2-page" class="wide-60 blog-page-section division bg-lightgrey">
    <div class="container">
        <div class="row">
        <!-- PRICING-2 HOLDER -->
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="txt-block pr-30">
                    <!-- Title -->
                    <h3 class="h3-md steelblue-color text-center">Donar Information</h3>
                    <!-- Plan Title  -->
                    <h5 class="h5-md steelblue-color">
                        Registered Donar
                    </h5>
                    <?php if($res_count > 0 ) { ?>
                    <div class="pricing-table mb-40">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Blood Group</th>
                                <th scope="col">Camp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                
                                <td>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['phone'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['bloodgroup'] ?>
                                </td>
                                <td>
                                    <?php echo $row['camp'] ?>
                                </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                        else { ?>
                    <h3 class="alert alert-info">No Record Found</h3>
                    <?php
                    
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
        
<?php include('admin_footer.php'); ?>
        
