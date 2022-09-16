<?php
session_start();
include_once ('../config.php');

$stmt = "SELECT * FROM jobs";
$res = $mysqli->query($stmt);
$ar = [];
if ($res->num_rows > 0) {
    $ar = $res->fetch_all(MYSQLI_ASSOC);
}

include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">View Jobs</h2>
            <div class="content-wrap">
                <table id="viewTable" class="table table-striped table-bordered table-responsive">
                <thead>
                    <th>Job Id</th>
                    <th>Job title</th>
                    <th>Job type</th>
                    <th>Format</th>
                    <th>Deadline</th>
                    <th>View</th>
                </thead>
                <tbody>
               
                    <?php if(!empty($ar)) { ?>
                        
                        <?php foreach($ar as $row) {
                             $rev_type=$row['revise'];
                             if($rev_type=='New'){
                                 $badge_color = "badge rounded-pill bg-success";
                             }
                             elseif($rev_type=='Revision'){
                                 $badge_color = "badge rounded-pill bg-danger";
                             }
                             else{
                                 $badge_color = "badge rounded-pill bg-warning text-dark";
                             }
                             $deadline = new DateTime($row['deadline']);
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td>
                                    <div class="pb-1"><?php echo $row['job_title']; ?></div>
                                    <div class="<?php echo $badge_color ?>"><?php echo $row['revise']; ?></div>
                                </td>
                                <td><?php echo $row['job_type']; ?></td>
                                <td><?php echo $row['format']; ?></td>
                                <td><?php echo $deadline->format('d-m-Y'); ?></td>
                                <td><a href="./view_files.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></a></td>
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

<?php include('../scripts.php'); ?>
<script>
    $(document).ready(function() {
    $('#viewTable').DataTable();
} );

</script>





