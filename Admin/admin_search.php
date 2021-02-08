<?php
include('admin_header.php');
$res_count_reg = 0;
$res_count_donor = 0;
$bggroup = "";
$no_result_reg = False;
$no_result_donor = False;

if (isset($_POST['donar_search'])) {
    $bggroup = $_POST['blood_group'];
    //From Registered Table
    $sql_reg = "SELECT * FROM registration WHERE blood_group = '" . $bggroup . "'";
    $res_reg = mysqli_query($con, $sql_reg);
    $res_count_reg = mysqli_num_rows($res_reg);

    if($res_count_reg == 0){
        $no_result_reg = True;
    }else{
        $no_result_reg = False;
    }
    //From Donor Table
    $sql_donor = "SELECT * FROM donation WHERE bloodgroup = '".$bggroup."'";
    $res_donor = mysqli_query($con,$sql_donor);
    $res_count_donor = mysqli_num_rows($res_donor);

    if($res_count_donor == 0){
        $no_result_donor = True;
    }else{
        $no_result_donor = False;
    }
}
?>

<section id="hero-4" class="bg-fixed hero-section division">
	<div class="container">
        <form method="POST" class="bg-blue" style="padding-left: 100px; padding-right: 100px; border-radius: 10px;">
                        <h4 class="white-color pt-4">SEARCH </h4>
                        <div class="input-group mb-3" style="padding-top: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Select Blood Group</span>
                            </div>
                            <select class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="blood_group">
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>
                        </div>
                        <div class="text-center" style="padding-top: 30px;">
                            <button type="submit" class="btn btn-orange tra-white-hover "  name="donar_search" style="margin: 10px; width: 50%;">SEARCH</button>
                        </div>
                    </div>
        </form>
        <div id="pricing-2-page" class="wide-60 blog-page-section division ">
            <div class="container">
                <div class="row">
                    <!-- PRICING-2 HOLDER -->
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="txt-block pr-30">
                            <?php if ($bggroup == "") { ?>
                                <h3 class="h3-md steelblue-color text-center">Please Select Blood Group</h3>
                                <?php } else {  ?>
                                    <h3 class="h3-md steelblue-color text-center">RESULTS FOR : <?php echo $bggroup ?> BLOODGROUP</h3>
                                    <h3 class="h3-md steelblue-color text-center">From Registered User:</h3>
                                        <?php } ?>
                                        <?php if ($res_count_reg > 0) { ?>
                                            <div class="pricing-table mb-40 bg-lightgrey">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Age</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Phone</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Blood Group</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while ($row_reg = mysqli_fetch_assoc($res_reg)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row_reg['Name'] ?></td>
                                                            <td><?php echo $row_reg['Age'] ?></td>
                                                            <td><?php echo $row_reg['Gender'] ?></td>
                                                            <td><?php echo $row_reg['Phone'] ?></td>
                                                            <td><?php echo $row_reg['email'] ?></td>
                                                            <td><?php echo $row_reg['blood_group'] ?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
                                            <?php
                                                if($no_result_reg == True){ ?>
                                                <h3 class="h3-md steelblue-color text-center">OOPs!! No Result Found</h3>
                                                <?php
                                                    }
                                                ?>
                        </div>
                        <div class="txt-block pr-30">
                        <?php if ($bggroup != "") { ?>
                             <h3 class="h3-md steelblue-color text-center">From Donor List: </h3>
                             <?php
                        }
                             ?>
                                        <?php if ($res_count_donor > 0) { ?>
                                            <div class="pricing-table mb-40 bg-lightgrey">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Phone</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Blood Group</th>
                                                            <th scope="col">Camp Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while ($row_donor = mysqli_fetch_assoc($res_donor)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row_donor['name'] ?></td>
                                                            <td><?php echo $row_donor['phone'] ?></td>
                                                            <td><?php echo $row_donor['email'] ?></td>
                                                            <td><?php echo $row_donor['bloodgroup'] ?></td>
                                                            <td><?php echo $row_donor['camp'] ?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
                                            <?php
                                                if($no_result_donor == True){ ?>
                                                <h3 class="h3-md steelblue-color text-center">OOPs!! No Result Found</h3>
                                                <?php
                                                    }
                                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('admin_footer.php');
?>