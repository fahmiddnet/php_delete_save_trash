<?php 
// for Searching 
if(isset($_POST['submit'])){
    $searchRes = $_POST['searchText'];
    $sql = "SELECT * FROM student WHERE id='$searchRes'";
    $searchresult = mysqli_query($conn,$sql);
}
?>

    <?php if($searchresult) {
    if($mysqli_num_rows($result) > 0){
        $searchRow = mysqli_fetch_assoc($result);
            echo "
                
            "
    }}?>