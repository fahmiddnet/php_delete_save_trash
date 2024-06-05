<?php include('./db/connect.php'); ?>

<?php
    // echo "<pre>";
    // print_r($_POST);

    if(isset($_POST['checkbox'][0])){
        foreach($_POST['checkbox'] as $list) {
            $id = mysqli_real_escape_string($conn,$list);
            $deleteres= "DELETE FROM student WHERE id='$id'";
            mysqli_query($conn,$deleteres);
        }
    }
?>


<?php include('./Layout/footer.php'); ?>