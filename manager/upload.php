<?php 
if(!empty($_FILES)){ 
    // Include the database configuration file 
    include_once ('../config.php');
    $jobid = $_POST['jobid'];
    $jobstatus = $_POST['jobstatus'];

    // $query1 = "SELECT * FROM jobs WHERE id = $jobid";
    //     $result1 = $mysqli->query($query1);
    //     $arr1 = [];
    //     if ($result1->num_rows > 0) {
    //         $arr1 = $result1->fetch_all(MYSQLI_ASSOC);
    //     }
    //     foreach($arr1 as $row1){
    //         $client = $row1['client_id'];
    //     }
    
    //     $stmt = "SELECT * FROM  tblusers WHERE id = $client";
    //     $result2 = $mysqli->query($stmt);
    //     $arr2 = [];
    //     if ($result2->num_rows > 0) {
    //         $arr2 = $result2->fetch_all(MYSQLI_ASSOC);
    //     }
    //     foreach($arr2 as $row2){
    //         $clientemail = $row2['EmailId'];
    //     }
    //     if($jobstatus == 'completed'){
        
    //         $FromName="Vector Art USA";
    //         $FromEmail="no_reply@vectorartusa.com";
    //         $ReplyTo="info@vectorartusa.com";
    //         $credits="All rights are reserved | Vector Art USA "; 
    //         $headers  = "MIME-Version: 1.0\n";
    //             $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    //             $headers .= "From: ".$FromName." <".$FromEmail.">\n";
    //             $headers .= "Reply-To: ".$ReplyTo."\n";
    //             $headers .= "X-Sender: <".$FromEmail.">\n";
    //             $headers .= "X-Mailer: PHP\n"; 
    //             $headers .= "X-Priority: 1\n"; 
    //             $headers .= "Return-Path: <".$FromEmail.">\n"; 
    //             $subject="You file has been completed"; 
    //             $baseurl = "http://" . $_SERVER['SERVER_NAME'];
    //             $msg="Your file has been completed to check <br> <a href='$baseurl'>click here</a> <br><br> <br> <br> <center>".$credits."</center>"; 
    //             if(@mail($clientemail,$subject,$msg,$headers,'-f'.$FromEmail)){
    //                 header("location:view_files.php.php?sent=1");
    //             }
    //             else{
    //                 header("location:view_files.php.php?servererr=1");
    //             }
    //     }
    // File path configuration 
    $uploadDir = "uploads/"; 
    $fileName = $jobid.'_'.basename($_FILES['file']['name']); 
    $uploadFilePath = $uploadDir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 
        $sql = "INSERT INTO managerfiles (job_id,jobstatus,file_name, uploaded_on) VALUES ($jobid ,'$jobstatus','".$fileName."', NOW())"; 
        $insert = $mysqli->query($sql);
    }
    
    
    
} 

?>