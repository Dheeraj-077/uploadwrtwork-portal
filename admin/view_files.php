<?php  
session_start();
include('../header.php'); 
include('../navbar.php'); 
include_once ('../config.php');

//fetch jobs details
$id=$_GET['id'];
$sql = "SELECT * FROM `jobs` where id = $id";
$arr=[];
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $arr = $result->fetch_all(MYSQLI_ASSOC);
}

// fetch file to download from database

$stmt = "SELECT * FROM files WHERE job_id=$id";
$arr1=[];
$result1 = $mysqli->query($stmt);
if ($result1->num_rows > 0) {
    $arr1 = $result1->fetch_all(MYSQLI_ASSOC);
}

$stmt1 = "SELECT * FROM managerfiles WHERE job_id=$id";
$arr2=[];
$result2 = $mysqli->query($stmt1);
if ($result2->num_rows > 0) {
    $arr2 = $result2->fetch_all(MYSQLI_ASSOC);
}


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="content-wrap">
            <div class="tab-wrapper">
                <h1>JOBS</h1>
                <input id="radio1" type="radio" name="css-tabs" checked>
                <input id="radio2" type="radio" name="css-tabs">
                <input id="radio3" type="radio" name="css-tabs">
                <input id="radio4" type="radio" name="css-tabs">
                <div id="tabs">
                    <label id="tab1" for="radio1">Job Details</label>
                    <label id="tab2" for="radio2">Client Uploads</label>
                    <label id="tab3" for="radio3">Completed Files</label>
                </div>
                <div id="content">
                    <section id="content1">
                        <?php foreach($arr as $row) { $deadline = $row['deadline'] ?>
                            <div class="bg-dark bg-gradient text-white p-3">
                                <div class="row">
                                    <div class="col-md-4"><div class="job-id">JOB ID: <badge class="badge bg-primary"><?php echo $row['id'];?></badge></div></div>
                                    <div class="col-md-4">JOB TITLE: <?php echo $row['job_title'] ?></div>
                                    <div class="col-md-4">JOB TYPE: <?php echo $row['job_type'] ?></div>
                                    
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-4">FORMAT: <span class="badge bg-warning text-dark"><?php echo $row['format']; ?></span></div>
                                    <div class="col-md-4">DEADLINE: <?php echo date('d-m-Y', strtotime($deadline)) ?><span class="badge bg-danger mx-2"><?php echo $row['timeline']; ?></span></div>
                                    <div class="col-md-4">PO#: <?php echo $row['po_no']; ?></div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-12">
                                        JOB DESCRIPTION: <?php echo $row['job_description']; ?>
                                    </div>
                                </div>
                                
                            </div>
                        <?php } ?>
                    </section>
                    <section id="content2">
                        <div class="row">                           
                            <?php foreach($arr1 as $row1) { $date= new DateTime($row1['uploaded_on']) ?>
                            <div class="col-md-3 text-center py-2">
                                <div class="file-icon"><i class="fas fa-file-alt fa-4x "></i></div>  
                                <div class="file-name py-2"><?php echo $row1['file_name'] ?></div>
                                <div class="uploaded pb-2">Uploaded on: <?php echo $date->format('d-m-Y') ?></div>
                                <div class="download-btn"><a href="../client/download.php?id=<?php echo $row1['id'] ?>" class="btn btn-primary">Download</a></div>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <section id="content3">
                        <div class="form-wrapper">
                                <div class="row">    
                                <?php if(!empty($arr2)) { ?>                       
                                    <?php foreach($arr2 as $row2) { $date= new DateTime($row2['uploaded_on']) ?>
                                    <div class="col-md-3 text-center py-2">
                                        <div class="file-icon"><i class="fas fa-file-alt fa-4x"></i></div>  
                                        <div class="file-name py-2"><?php echo $row2['file_name'] ?></div>
                                        <div class="uploaded pb-2">Uploaded on: <?php echo $date->format('d-m-Y') ?></div>
                                        <div class="download-btn"><a href="./complete_download.php?id=<?php echo $row2['id'] ?>" class="btn btn-primary">Download</a></div>
                                    </div>
                                    <?php } ?>
                                <?php } else{
                                    echo "<h3 class='text-center'>Working on Files...</h3>";
                                }?>
                                 </div>
                            </div>
                    </section>
                </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
<?php include('../scripts.php'); ?>

