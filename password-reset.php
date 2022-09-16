<?php session_start();
include_once('config.php');
$token = $_GET['token'];
if(isset($_POST['passwordreset'])){
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    // if($password == ''){
    //     header("location:password-reset.php?err=Please enter the password");
    // }
    // if($confirmpassword == ''){
    //     header("location:password-reset.php?err=Please enter the Confirm password"); 
    // }
    if($password != $confirmpassword){
        header("location:password-reset.php?err=Password do not match");
    }
    $fetchquery = "SELECT email FROM pass_reset WHERE token='$token'";
    $fetchresultok = mysqli_query($mysqli,$fetchquery);
    if($res = mysqli_fetch_array($fetchresultok)){
        $email = $res['email'];
    }
    if(isset($email) != '')
    {
        $emailtok = $email;
    }
    else{
        $err[] = 'Link has been expired or something is missing';
        $hide=1;
    }
    if(!isset($err)){
        $updatequery = "UPDATE `tblusers` SET Password='$password' WHERE EmailId='$emailtok'";
        $resultresetpass = mysqli_query($mysqli,$updatequery );
        if($resultresetpass){
            $success = "<div class='text-success'>Your password has been updated successfully..<br> <a href='index.php'>Login</a></div>";

            $delquery = "DELETE FROM pass_reset WHERE token = '$token'";
            $resultdel = mysqli_query($mysqli,$delquery);
            $hide=1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <title>Vector Art USA</title>
</head>
<body>
    <div class="background-blue h-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100 bg-white">
                <div class="col-md-6 py-4 ">
                    <div class="logo-wrap text-center mb-4">
                        <img src="./images/logo.png" alt="logo" class="img-fluid">
                    </div>
                    <form method="post"> 
                        <?php if(isset($_GET['err'])) { $error = $_GET['err']; ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo $error; ?></p>
                            </div>
                        <?php } ?>

                        <?php if(isset($success)) { ?>
                        <?php echo $success ?>
                        <?php }?>
                        

                        <?php if(!isset($hide)) { ?>
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i><span></div>
                                <input type="password" class="form-control" name="password" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i><span></div>
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-lg" name="passwordreset" >Reset Password</button>
                        </div>
                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/all.min.js"></script>
</html>