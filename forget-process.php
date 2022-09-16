<?php
include_once('config.php');
if (isset($_POST['forget'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);

    if(empty($email)){
        header("location:forget-password.php?error=Email is required");
        exit();
    }
    else{
        $sql = "SELECT * FROM tblusers where EmailId='$email'";
        $result = mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $oldftemail = $row['EmailId'];
            $token = bin2hex(random_bytes(50));
            $query = "INSERT INTO pass_reset(`email`, `token`) VALUES ('$email','$token')";
            $inresult = mysqli_query($mysqli,$query);
            if($inresult){
                $FromName="Vector Art USA";
                $FromEmail="no_reply@vectorartusa.com";
                $ReplyTo="info@vectorartusa.com";
                $credits="All rights are reserved | Vector Art USA "; 
                $headers  = "MIME-Version: 1.0\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                    $headers .= "From: ".$FromName." <".$FromEmail.">\n";
                    $headers .= "Reply-To: ".$ReplyTo."\n";
                    $headers .= "X-Sender: <".$FromEmail.">\n";
                    $headers .= "X-Mailer: PHP\n"; 
                    $headers .= "X-Priority: 1\n"; 
                    $headers .= "Return-Path: <".$FromEmail.">\n"; 
                    $subject = "You have received password reset email";
                    $baseurl = "http://" . $_SERVER['SERVER_NAME'];
                    $msg = "Your password reset link <br> $baseurl/password-reset.php?token=$token <br> Reset your password with this link .Click or open in new tab<br><br> <br> <br> <center>".$credits."</center>";
                    if(@mail($oldftemail,$subject,$msg,$headers,'-f'.$FromEmail)){
                        header("location:forget-password.php?sent=1");
                    }
                    else{
                        header("location:forget-password.php?servererr=1");
                    }
            }
            else{
                header("location:forget-password.php?something_wrong=1");
            } 
        }
        else{
            header("location:forget-password.php?error=Email id does not exist ");
            exit();}
        
        
    }
}
?>