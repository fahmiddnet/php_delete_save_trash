<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])){


include('./Layout/header.php'); ?>

<?php 
    $sql2 = "SELECT * FROM student WHERE flag_dlt='1'";
    $res = mysqli_query($conn,$sql2);
    $student_info = mysqli_fetch_all($res,MYSQLI_ASSOC); 
?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                 <a href="javascript:void(0)" onclick="delete_all()" class="btn btn-danger my-4">Trash Clear</a>
                 <a href="javascript:void(0)" onclick="restore_all()" class="btn btn-success my-4 mx-3">Restore</a>
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
                                <td><?php echo $stu_info['name'] ?></td>
                                <td><?php echo $stu_info['age'] ?></td>
                                <td><?php echo $stu_info['body'] ?></td>
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

    function select_all(){
        // alert('a');
        if(jQuery('#delete').prop("checked")){
            jQuery('input[type=checkbox]').each(function(){
                jQuery('#'+this.id).prop('checked',true);
                // console.log(this.id);
            });
        } else {
            jQuery('input[type=checkbox]').each(function(){
                jQuery('#'+this.id).prop('checked',false);
                // console.log(this.id);
            });
        }
    }

    function delete_all() {
        var check = confirm("Are you sure?");
        if(check==true){
            jQuery.ajax({
                url:'delete.php',
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
    function restore_all() {
        var check = confirm("Are you sure?");
        if(check==true){
            jQuery.ajax({
                url:'restore.php',
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
