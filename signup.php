<?php

include_once ('config.php');

//Coding For Signup
    if(isset($_POST['signup']))
    {
        //Getting Post Values
        $fname=$_POST['fullname'];	
        $email=$_POST['email'];	
        $mobile=$_POST['mobilenumber'];	
        $pass=$_POST['password'];	
        $role = 'client';
        //Checking email id exist for not
        $result ="SELECT count(*) FROM tblusers WHERE EmailId=?";
        $stmt = $mysqli->prepare($result);
        $stmt->bind_param('s',$email);$stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

    //if email already exist
        if($count>0)
        {
        echo "<script>alert('Email id already associated with another account. Please try with diffrent EmailId.');</script>";
        } 
    // If email not exist
    else {
        $sql="INSERT into tblusers(FullName,EmailId,MobileNumber,Password,role)VALUES(?,?,?,?,?)";
        $stmti = $mysqli->prepare($sql);
        $stmti->bind_param('ssiss',$fname,$email,$mobile,$pass,$role);
        $stmti->execute();
        $stmti->close();
        echo "<script>alert('User registration successful');</script>";
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
                <div class="col-md-6 login-image">
                    <img src="./images/login.png" alt="login image" class="img-fluid">
                </div>
                <div class="col-md-6 py-4">
                    <div class="logo-wrap text-center mb-4">
                        <img src="./images/logo.png" alt="logo" class="img-fluid">
                    </div>
                    <form method="post" class="form-wrap">
                        <h2>Sign Up </h2>
                        <p>Please fill in this form to create an account!</p>
                        <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-user"></span></span></div>
                            <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required" pattern="[A-Za-z ]+" title="Letters only">
                        </div>
                        </div>
                                
                        <div class="form-group mt-3">
                        <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-paper-plane"></i></span></div>
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required="required" title="Valid Email id">
                        </div>
                        </div>
                                
                        <div class="form-group mt-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fa fa-mobile"></i>
                        </span>                    
                        </div>
                        <input type="tel" class="form-control" name="mobilenumber" placeholder="Mobile Number" required="required" pattern="[0-9]{10}" title="10 numeric characters only">
                        </div>
                        </div>
                                
                        <div class="form-group mt-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                        </span>                    
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters">
                        </div>
                        </div>
                        
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-lg" name="signup">Sign Up</button>
                        </div>
                        <div class="text-center mt-3">Already have an account? <a href="index.php">Login here</a></div>
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