<?php
include('admin_header.php');
$res_count = 0;
$bggroup = "";
$no_result = False;

if (isset($_POST['donar_search'])) {
    $bggroup = $_POST['blood_group'];
    $sql = "SELECT * FROM registration WHERE blood_group = '" . $bggroup . "'";
    $res = mysqli_query($con, $sql);
    $res_count = mysqli_num_rows($res);

    if($res_count == 0){
        $no_result = True;
    }else{
        $no_result = False;
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
                                        <?php } ?>
                                        <?php if ($res_count > 0) { ?>
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
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['Name'] ?></td>
                                                            <td><?php echo $row['Age'] ?></td>
                                                            <td><?php echo $row['Gender'] ?></td>
                                                            <td><?php echo $row['Phone'] ?></td>
                                                            <td><?php echo $row['email'] ?></td>
                                                            <td><?php echo $row['blood_group'] ?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
                                            <?php
                                                if($no_result == True){ ?>
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