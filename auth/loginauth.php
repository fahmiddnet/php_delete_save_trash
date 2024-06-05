<?php 

session_start();
 
include('../db/connect.php');

    
    if(isset($_POST['loginemail']) && isset($_POST['loginpassword'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $loginemail = validate($_POST['loginemail']);
        $loginpassword = validate($_POST['loginpassword']);

        if(empty($loginemail)){
            header("location:../login.php?errEmail");
            exit();
        } else if(empty($loginpassword)){
            header("location:../login.php?errPasswprd");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE email='$loginemail' AND password='$loginpassword'";

            $res = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);
                print_r($row);
                // print_r($row['id']);
                if($row['email'] === $loginemail && $row['password'] === $loginpassword){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    header("location: ../index.php");
                    exit();
                } else {
                    header("location: ../login.php?erruser_pass");
                    exit();
                }
                // header("location: ../index.php");
                // exit();
            } else {
                header("location: ../login.php?erruser_pass");
                exit();
            }
        }

    } else {
        header("location:../login.php");
        exit();
    }
    // $loginemail = $loginpassword = '';
    // $loginemailErr = $loginpasswordErr = '';
    // // echo "Log in Successfull";
    // if(isset($_POST['submit'])){
    //     // VALIDATION EMAIL 
    //     if(empty($_POST['loginemail'])){
    //         $loginemailErr = 'email is require';
    //     }else {
    //         $loginemail = filter_input(INPUT_POST,'loginemail',FILTER_SANITIZE_EMAIL);
    //     }
    //     // VALIDATION PASSWORD 
    //     if(empty($_POST['loginpassword'])){
    //         $loginpasswordErr = 'loginpassword is require';
    //     }else {
    //         $loginpassword = filter_input(INPUT_POST,'loginpassword',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //     }
    // }else {
    //    echo "Login is required"; 
    // }
?>