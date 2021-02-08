<?php
function redirect($link){
?>
<script>
    window.location.href = `<?php echo $link ?>`;
    </script>
<?php    
}

function display_msg($msg){
    echo "<script>alert('$msg')</script>";
}
?>