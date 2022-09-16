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
$num_rows = $result1->num_rows;

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
                                    <div class="file-icon"><i class="fas fa-file-alt fa-4x"></i></div>  
                                    <div class="file-name py-2"><?php echo $row1['file_name'] ?></div>
                                    <div class="uploaded pb-2">Uploaded on: <?php echo $date->format('d-m-Y') ?></div>
                                    <div class="download-btn"><a href="../client/download.php?id=<?php echo $row1['id'] ?>" class="btn btn-primary">Download</a></div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                        <section id="content3">
                        <div class="form-wrapper">
                        <?php if(isset($_GET['sent'])) {?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo "Email has sent successfully" ?></p>
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET['servererr'])) { ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo "The server failed to send the message. Please try again later. " ?></p>
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET['something_wrong'])) { ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo "Something went wrong" ?></p>
                            </div>
                        <?php } ?>
                                <form action="upload.php" class="dropzone drop-wrapper">
                                 <input type="hidden" name="jobid" value="<?php echo $id ?>" />
                                    <div class="dz-message">
                                        <div class="drop-icon"><i class="fas fa-cloud-upload-alt fa-4x"></i></div>
                                        <h5><strong>Drop files here or click to upload.</strong></h5>
                                    </div>
                                    <div class="button-wrap">
                                        <div class="form-group my-3">
                                            <div class="input-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="jobstatus" id="Radio1" value="completed" required checked>
                                                        <label class="form-check-label" for="Radio1">Completed</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="jobstatus" id="Radio2" value="pending" required>
                                                        <label class="form-check-label" for="Radio2">Pending</label>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button id="startUpload" class="btn btn-danger">Submit</button>
                            </div>
                            <script>
                                //Disabling autoDiscover
                                Dropzone.autoDiscover = false;
                                
                                $(function() {
                                    //Dropzone class
                                    var myDropzone = new Dropzone(".dropzone", {
                                        url: "upload.php",
                                        paramName: "file",
                                        maxFiles: 10,
                                        acceptedFiles: "image/*,application/pdf,.psd,.ai",
                                        autoProcessQueue: false,
                                        parallelUploads: 10,
                                        addRemoveLinks: true
                                    });
                                    
                                    $('#startUpload').click(function(){           
                                        myDropzone.processQueue();
                                    });
                                });
                            </script>
                        </section>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>  
<script src="../js/scripts.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/bootstrap.min.js"></script>



