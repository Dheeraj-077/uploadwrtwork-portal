<?php session_start();
include_once('config.php');
//Coding For Signup
if(isset($_POST['login']))
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if(empty($email)){
        header("location:index.php?error=Email is required");
        exit();
    }
    else if(empty($pass)){
        header("location:index.php?error=Password is required");
        exit();
    }
    else{
        $sql = "SELECT * FROM tblusers where EmailId='$email' AND Password='$pass'";
        $result = mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['EmailId'] === $email && $row['Password'] === $pass){
                if($row['role']=='admin'){
                    $_SESSION['fname']=$row['FullName'];
                    $_SESSION['uid']=$row['id'];
                    header('location:./admin/jobs.php');
                }
                elseif($row['role']=='manager'){
                    $_SESSION['fname']=$row['FullName'];
                    $_SESSION['uid']=$row['id'];
                    $_SESSION['email']=$row['EmailId'];
                    header('location:./manager/view_jobs.php');
                }
                elseif($row['role']=='client'){
                    header('location:./client/dashboard.php');
                    $_SESSION['fname']=$row['FullName'];
                    $_SESSION['uid']=$row['id'];
                }
                else{
                    header('location:./index.php');
                }
            }
        }
        else{
            header("location:index.php?error=Incorrect username or password");
            exit();
        }
        
        
    }

    //Getting Post Values
    // $email=$_POST['email'];	
    // $pass=$_POST['password'];	
    // $stmt = $mysqli->prepare( "SELECT FullName,id FROM tblusers WHERE (EmailId=? && Password=?)");
    // $stmt->bind_param('ss',$email,$pass);
    // $stmt->execute();
    // $stmt->bind_result($FullName,$id,$role);
    // $rs= $stmt->fetch ();
    // $stmt->close();
    // if (!$rs) {
    //     echo "<script>alert('Invalid Details. Please try again.')</script>";
    // } 
    // else {
    //     $_SESSION['fname']=$FullName;
    //     $_SESSION['uid']=$id;
    //     header('location:./client/dashboard.php');
    // }

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
                <div class="col-md-6 login-image bg-white">
                    <img src="./images/login.png" alt="login image" class="img-fluid">
                </div>
                <div class="col-md-6 py-4 ">
                    <div class="logo-wrap text-center mb-4">
                        <img src="./images/logo.png" alt="logo" class="img-fluid">
                    </div>
                    <form  method="post" class="">
                        <!-- <h2>User Login</h2>     -->
                        <?php if(isset($_GET['error'])) { ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo $_GET['error'] ?></p>
                            </div>
                        <?php } ?>
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-paper-plane"></i></span></div>
                                <input type="email" class="form-control" name="email" placeholder="Email Address"  title="Valid Email id">
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i><span></div>
                                <input type="password" class="form-control" name="password" placeholder="Password" >
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
                        </div>
                        <div class="login-helpers mt-3">
                            <a href="forget-password.php">Forgot Password?</a> <br> Don't have an account with us? <a href="signup.php">Register now!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61ee8fb3b9e4e21181bb8a38/1fq5u2lvl';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
<script src="./js/all.min.js"></script>
</html>