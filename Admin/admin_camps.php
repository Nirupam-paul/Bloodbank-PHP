<?php
include('admin_header.php');
include('../constant.php');

if (isset($_POST['camp_submit'])) {
    $camp_title = $_POST['camp_title'];
    $organized_by = $_POST['organized_by'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $details = $_POST['camp_details'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $image = $_FILES['camp_pic']['name'];
    //Move Image File
    move_uploaded_file($_FILES['camp_pic']['tmp_name'],SERVER_CAMP_IMAGE.$_FILES['camp_pic']['name']);
    

    $sql = "INSERT INTO camps(camp_title,organized_by,state,city,image,details,from_date,to_date) VALUES('" . $camp_title . "','" . $organized_by . "','" . $state . "','" . $city . "','".$image."','" . $details . "','" . $from_date . "','" . $to_date . "')";

    $res = mysqli_query($con, $sql);

    if ($res == False) {

        echo "<script>alert('Server Failed')</script>";
    } else {

        redirect('admin_camps.php');
    }
}
?>

<section id="hero-4" class="bg-fixed hero-section division">
    <div class="container">
        <h2 class="h2-sm steelblue-color text-center">CAMPS </h2>
        <div id="hero-section-form" class="text-center mb-40">
            <form method="POST" style="padding-left: 100px; padding-right: 100px; " enctype="multipart/form-data">
                <div class="input-group mb-3" style="padding-top: 30px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Camp title</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="camp_title" required>
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">Organized By</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="organized_by"  required>
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">From</span>
                    </div>
                    <input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="from_date"  required>
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">To</span>
                    </div>
                    <input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="to_date"  required>
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">State</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="state"  required>
                </div>
                <div class="input-group mb-3" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color" id="basic-addon1">City </span>
                    </div>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="city"  required>
                </div>
                <div class="input-group" style="padding-top: 10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color">Enter Details</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="camp_details"  required></textarea>
                </div>
                <div class="input-group" style="padding-top:10px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue white-color">Upload Camp Picture</span>
                    </div>
                    <input type="file" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="camp_pic"  required>
                </div>
                <div class="text-center" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-orange btn-sm btn-tra-black blue-hover" name="camp_submit" style="margin: 10px; width: 30%;">Enter </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include('admin_footer.php');
?>