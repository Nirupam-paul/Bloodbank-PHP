<?php
include('admin_header.php');

# Camp Details
$sql = "SELECT camp_title FROM camps";
$res_camp = mysqli_query($con, $sql);
$camp_row = mysqli_num_rows($res_camp);


if (isset($_POST['donation_submit'])) {
    $donar_name = $_POST['donar_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email_name'];
    $blood_group = $_POST['blood_group'];
    $camp = $_POST['camp_name'];

    # Update Blood Stock
    $sql_blood = "SELECT * FROM blood_stock";
    $res_blood = mysqli_query($con,$sql_blood);
    $row_blood = mysqli_fetch_assoc($res_blood);
    $add_blood = $row_blood[$blood_group] + 1;
  
    $sql_blood_update = "UPDATE `blood_stock` SET `$blood_group`= $add_blood";
    $res_blood_update = mysqli_query($con,$sql_blood_update);
    


    # Insert into Donation Group
    $sql = "INSERT INTO donation(name,phone,email,bloodgroup,camp) VALUES('" . $donar_name . "','" . $phone . "','" . $email . "','" . $blood_group . "','" . $camp . "')";
    $res = mysqli_query($con, $sql);

    if (($res == False) || ($res_blood_update == False)) {

        echo "<script>alert('Server Failed')</script>";
    } else {

        echo "<script>alert('Save Successfully')</script>";
    }
}

?>

<section id="hero-4" class="bg-fixed hero-section division">
	<div class="container">
        <h2 class="h2-sm steelblue-color text-center">DONAR ENTRY </h2>
        <div id="hero-section-form" class="text-center mb-40">
            <form method="POST" style="padding-left: 100px; padding-right: 100px; ">
                <div class="input-group mb-3" style="padding-top: 30px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Donar Name</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="donar_name">
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Phone Number</span>
                    </div>
                    <input type="number" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="phone">
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Email</span>
                    </div>
                    <input type="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="email_name">
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Select Blood Group</span>
                    </div>
                    <select class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="blood_group">
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
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Select Camp Name</span>
                    </div>
                    <?php if ($camp_row > 0) { ?>
                    <select class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="camp_name">
                        <?php
                        while ($row = mysqli_fetch_assoc($res_camp)) { ?>
                            <option value="<?php echo $row['camp_title'] ?>"><?php echo $row['camp_title'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                <?php
                }
                ?>
                </div>
                <div class="text-center" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-orange btn-sm btn-tra-black blue-hover " name="donation_submit" style="margin: 10px; width: 30%;">Enter </button>
                </div>
            </form>
		</div>
    </div>
</section>


<?php
include('admin_footer.php');
?>