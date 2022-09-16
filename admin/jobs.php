<?php
session_start();
include_once ('../config.php');

$sql1 = "SELECT * FROM jobs";
$result1 = $mysqli->query($sql1);
$arr1 = [];
if ($result1->num_rows > 0) {
    $arr1 = $result1->fetch_all(MYSQLI_ASSOC);
}
foreach($arr1 as $row1){
    $client = $row1['client_id'];
}

$smt = "SELECT * FROM  tblusers WHERE id = $client";
$result2 = $mysqli->query($smt);
$arr2 = [];
if ($result2->num_rows > 0) {
    $arr2 = $result2->fetch_all(MYSQLI_ASSOC);
}
foreach($arr2 as $row2){
    $client_name = $row2['FullName'];
}

include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">View Jobs</h2>
            <div class="content-wrap">
            
                <table id="viewTable" class="table table-bordered table-responsive">
                <thead>
                    <th>Job Id</th>
                    <th>Job title</th>
                    <th>Client Name</th>
                    <th>Job type</th>
                    <th>Format</th>
                    <th>Uploaded On</th>
                    <th>Deadline</th>
                    <th>View</th>
                </thead>
                <tbody>
                   
                    <?php if(!empty($arr1)) { ?>
                        
                        <?php foreach($arr1 as $row1) { 
                            $date= new DateTime($row1['uploaded_on']);
                            $rev_type=$row1['revise'];
                            if($rev_type=='New'){
                                $badge_color = "badge rounded-pill bg-success";
                            }
                            elseif($rev_type=='Revision'){
                                $badge_color = "badge rounded-pill bg-danger";
                            }
                            else{
                                $badge_color = "badge rounded-pill bg-warning text-dark";
                            } ?>
                            <tr>
                                <td><?php echo $row1['id'];?></td>
                                <td>
                                    <div class="pb-1"><?php echo $row1['job_title']; ?></div>
                                    <div class="<?php echo $badge_color ?>"><?php echo $row1['revise']; ?></div>
                                </td>
                                <td><?php echo $client_name; ?></td>
                                <td><?php echo $row1['job_type']; ?></td>
                                <td><?php echo $row1['format']; ?></td>
                                <td><?php echo $date->format('d-m-Y') ?></td>
                                <td><?php echo $row1['deadline']; ?></td>
                                <td><a href="view_files.php?id=<?php echo $row1['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></a></td>
  
                            </tr>
                                                            
                        <?php } ?>
                    <?php } ?>
                </tbody>
                </table>
            </div> 
        </div>
    </main>
</div>
</div>
<?php include('../footer.php'); ?>
<?php include('../scripts.php'); ?>
<script>
    $(document).ready(function() {
    $('#viewTable').DataTable();
} );

</script>


