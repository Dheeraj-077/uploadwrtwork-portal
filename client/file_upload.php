<?php session_start();
include_once('../config.php');
$userid=$_SESSION['uid'];
if(isset($_POST['postdata'])){
    $jobtitle = $_POST['job_title'];
    $po = $_POST['po_no'];
    $jobtype = $_POST['job_type'];
    $revise = $_POST['revise'];
    $timeline = $_POST['timeline'];
    $checkbox1 = $_POST['format'];
    $chk="";
    foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
   $job_description = $_POST['job_description'];
   $deadline = $_POST['deadline'];

   $sql = "INSERT INTO jobs (`client_id`,`job_title`, `po_no`, `job_type`, `revise`, `timeline`, `format`, `job_description`, `deadline`,`uploaded_on`) VALUES ('$userid','$jobtitle','$po','$jobtype','$revise','$timeline','$chk','$job_description','$deadline','".date("Y-m-d H:i:s")."')";
   if(mysqli_query($mysqli, $sql)){
    header('location:./view_jobs.php');
    echo "Records added successfully.";
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }

    $sql1 =  "SELECT * FROM jobs";
    $arr = [];
    $result = $mysqli->query($sql1);
    if ($result->num_rows > 0) {
        $arr = $result->fetch_all(MYSQLI_ASSOC);
    }
    foreach($arr as $row){
        $jobid = $row['id'];
    }


    if(isset($_FILES['files'])){
        $errors= array();
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
            $file_name = $key.$_FILES['files']['name'][$key];
            $file_size =$_FILES['files']['size'][$key];
            $file_tmp =$_FILES['files']['tmp_name'][$key];
            $file_type=$_FILES['files']['type'][$key];	
            // if($file_size > 2097152){
            // 	$errors[]='File size must be less than 2 MB';
            // }		
            $query="INSERT into files (`client_id`,`job_id`, `file_name`, `file_size`, `file_type`, `uploaded_on`) VALUES($userid,$jobid,'$file_name','$file_size','$file_type','".date("Y-m-d H:i:s")."'); ";
            $desired_dir="user_data";
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir("$desired_dir", 0700);		// Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
                }else{									// rename the file if another one exist
                    $new_dir="$desired_dir/".$file_name.time();
                     rename($file_tmp,$new_dir) ;				
                }
                $mysqli -> query($query);  		
            }else{
                    print_r($errors);
            }
        }
        if(empty($error)){
            echo "Success";
        }
    }
    
}


?>