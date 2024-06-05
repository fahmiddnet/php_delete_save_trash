<?php include('./db/connect.php'); ?>

<?php 
if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list) {
        $id = mysqli_real_escape_string($conn,$list);
        $deleteres= "UPDATE student SET flag_dlt = 1 WHERE id = '$id'";
        mysqli_query($conn,$deleteres);
    }
}

?>