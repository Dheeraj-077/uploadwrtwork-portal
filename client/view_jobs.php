<?php
session_start();
include_once ('../config.php');

$stmt = "SELECT * FROM jobs";
$res = $mysqli->query($stmt);
$output = [];
if ($res->num_rows > 0) {
    $output = $res->fetch_all(MYSQLI_ASSOC);
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
                    <?php if(!empty($output)) { ?>
                        
                        <?php foreach($output as $row) { $deadline = new DateTime($row['deadline']);?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['job_title']; ?></td>
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




