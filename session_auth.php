<?php
if(!isset($_SESSION['username'])){
    redirect('login.php');
}
?>