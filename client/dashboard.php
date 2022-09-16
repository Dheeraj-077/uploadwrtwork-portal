<?php  
session_start();
include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">POST A JOB</h2>
            <div class="content-wrap">
            <form role="form" method="POST" action="./file_upload.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input class="form-control" name="job_title" id="job_title" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="po_no">PO#</label>
                        <input class="form-control" name="po_no" id="po_no" maxlength="15" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="job_type">Job Type *</label>
                    <select class="form-control" name="job_type" id="job_type" required>
                        <option value="" selected disabled>Select Job Type</option>
                        <?php
                            include_once ('../config.php');
                            $records = mysqli_query($mysqli, "SELECT * FROM addjobtype");
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['jobtype'] ."'>" .$data['jobtype']." ".'$'.$data['pricing']  ."</option>";
                            }	
                        ?> 
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="tip" style="border-bottom: 1px dotted black;">
                            Revision?
                            </label>
                            <div>
                                <input type="radio" name="revise" value="New" checked>&nbsp;<label for="">New</label>&nbsp;
                                <input type="radio" name="revise" value="Revision">&nbsp;<label for="">Revision</label>&nbsp;
                                <input type="radio" name="revise" value="Quote First">&nbsp;<label for="">Quote First</label>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="tip" style="border-bottom: 1px dotted black;">Rush?</label>
                            <div>
                                <input type="radio" name="timeline" value="Standard" checked>&nbsp;<label for="">Standard</label>&nbsp;
                                <input type="radio" name="timeline" value="Rush">&nbsp;<label for="">RUSH (doubles price)</label>&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label class="tip" style="border-bottom: 1px dotted black;">Format needed</label>
                    <div>
                        <input id="pdf_check" type="checkbox" name="format[]" value="Vector PDF">&nbsp;<label for="">Vector PDF</label>&nbsp;
                        <input type="checkbox" name="format[]" value="CS6 EPS">&nbsp;<label for="">CS6 EPS</label>&nbsp;
                        <input type="checkbox" name="format[]" value="CS5 EPS">&nbsp;<label for="">CS5 EPS</label>&nbsp;
                        <input type="checkbox" name="format[]" value="CS4 EPS">&nbsp;<label for="">CS4 EPS</label>&nbsp;
                        <input type="checkbox" id="jpg_check" name="format[]" value="JPG">&nbsp;<label for="">JPG</label>&nbsp;
                        <input type="checkbox" name="format[]" value="PNG">&nbsp;<label for="">PNG</label>&nbsp;
                        <input type="checkbox" name="format[]" value="High Res 300 DPI">&nbsp;<label for="">High Res 300 DPI</label>&nbsp;
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="job_description" class="tip" style="border-bottom: 1px dotted black;">Description</label>
                    <textarea class="form-control" rows="3" name="job_description" id="job_description" placeholder="Enter Job Description"></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="deadline" class="tip" style="border-bottom: 1px dotted black;">Deadline </label>
                    <input type="date" class="form-control datepicker" name="deadline" id="deadline">
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="text-only" class="tip" style="border-bottom: 1px dotted black;">Text Only</label>&nbsp;<input type="checkbox" id="text-only" onclick="$('.file-section').slideToggle()">
                    </div>
                </div>
                <div class="divide-20 mt-3">
                </div>
                <!-- <div class="dropzone-previews dz-message alert alert-success" style="border-width:7px; border-style:dashed;">
                    <h3 class="text-center" id="msg" style="padding:5%;">Drop your files here Or Click!</h3>
                </div> -->
                <div class="row mt-3">
                    <div class="file-section"><input type="file" name="files[]" multiple/></div>
                </div>
                
                <button type="submit" id="aj_submit" class="btn btn-success mt-3" onclick = "return confirm('Are you sure you want to Save this')" name="postdata">Post</button></span>
                </form>

            </div>
        </div>
    </main>
</div>
</div>
<?php include('../scripts.php'); ?>
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
