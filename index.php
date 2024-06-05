<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])){


include('./Layout/header.php'); 
?>

<?php 
    $sql2 = "SELECT * FROM student WHERE flag_dlt='0'";
    $res = mysqli_query($conn,$sql2);
    $student_info = mysqli_fetch_all($res,MYSQLI_ASSOC); 
    $deleteCount = 0;
    
?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                 <a href="javascript:void(0)" onclick="tem_delete_all()" class="btn btn-danger my-4">Delete <span id="countDltN"></span></a>
                 <a href="trash.php"  class="btn btn-warning my-4 mx-3">Trash</a>
                    <form method="POST" id="frm">
                        <table class="table table-striped table-hover" width="100%">
                            <tr class="table-info">
                                <th>  
                                    <input class="form-check-input" type="checkbox" 
                                    value="" 
                                    id="delete"
                                    onclick="select_all()"
                                    >
                                </th>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Comment</th>
                                <th>Flag</th>
                            </tr>
                            <?php $index=1; foreach($student_info as $stu_info): ?>
                           
                                    <tr id="box<?php echo $stu_info['id'] ?>">
                                        <td>
                                            <input  
                                                type="checkbox" 
                                                id="<?php echo $stu_info['id'] ?>" 
                                                name="checkbox[]"
                                                value="<?php echo $stu_info['id'] ?>"
                                                class="form-check-input"
                                                >
                                        </td>
                                        <td><?php echo $index ?></td>
                                        <td><?php echo $stu_info["name"] ?></td>
                                        <td><?php echo $stu_info["age"] ?></td>
                                        <td><?php echo $stu_info["body"] ?></td>
                                        <td><?php echo $stu_info["flag_dlt"] ?></td>
                                    </tr>
                            <?php $index++ ?>
                            <?php endforeach; ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>


<script>

    var checkbox = document.querySelector("input[type='checkbox']");
    var Dleterall = document.getElementById('countDltN');

    checkbox.addEventListener('change', function() {
    if (this.checked) {
        Dleterall.innerHTML = "All";
        // console.log("Checkbox is checked..");
    } else {
        Dleterall.innerHTML = "";
        // console.log("Checkbox is not checked..");
    }
    });
    
    function select_all(){
        // alert('a');
        if(jQuery('#delete').prop("checked")){
            jQuery('input[type=checkbox]').each(function(){
                jQuery('#'+this.id).prop('checked',true);
            });
        } else {
            jQuery('input[type=checkbox]').each(function(){
                jQuery('#'+this.id).prop('checked',false);
                // console.log(this.id);
            });
        }
    }

    function tem_delete_all() {
        var check = confirm("Are you sure to delete this?");
        if(check==true){
            jQuery.ajax({
                url:'temp_dlt.php',
                type:'post',
                data:jQuery('#frm').serialize(),
                success:function(){
                    jQuery('input[type=checkbox]').each(function(){
                        if(jQuery('#'+this.id).prop("checked")){
                                jQuery('#box'+this.id).remove();
                        }
                });
                }
            });
        }
    }
    
</script>

<?php 
include('./Layout/footer.php');  

}else {
    header('location:login.php');
}
?>