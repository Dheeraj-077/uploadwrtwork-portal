<?php
session_start();
include_once ('../config.php');

//Coding For Signup
if(isset($_POST['signup']))
{
    //Getting Post Values
    $fname=$_POST['fullname'];	
    $email=$_POST['email'];	
    $mobile=$_POST['mobilenumber'];	
    $pass=$_POST['password'];	
    $role = $_POST['role'];

    //Checking email id exist or not
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
    header('location:./view_manager.php');
    echo "<script>alert('Client registration successful');</script>";
    
}
}
include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="admin-signup">
            <div class="content-wrap">
                <div class="background-wrap">
                    <div class="container">
                        <form method="post" class="form-wrap">
                            <p>Please fill in this form to create an <strong>Manager or Admin</strong> account!</p>
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
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile"></i></span></div>
                                    <input type="tel" class="form-control" name="mobilenumber" placeholder="Mobile Number" required="required" pattern="[0-9]{10}" title="10 numeric characters only">
                                </div>
                            </div>
                                    
                            <div class="form-group mt-3">
                                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="admin" required>
                                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="manager" required>
                                            <label class="form-check-label" for="inlineRadio2">Manager</label>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-lg" name="signup">Sign Up</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div> 
        </div>
    </main>
</div>
</div>
</script>
<?php include('../scripts.php'); ?>



