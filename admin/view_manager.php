<?php
session_start();
include_once ('../config.php');

$sql = "SELECT * FROM tblusers";
$result = $mysqli->query($sql);
$output = [];
if ($result->num_rows > 0) {
    $output = $result->fetch_all(MYSQLI_ASSOC);
}

include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">View Managers</h2>
            <div class="content-wrap">
                <table id="viewTable" class="table table-bordered table-responsive">
                <thead>
                    <th>Id</th>
                    <th>FullName</th>
                    <th>Email Id</th>
                    <th>Mobile No.</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                  
                        
                        <?php foreach($output as $row) { 
                            if( $row['role'] == "admin" || $row['role'] == "manager"){  
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['FullName']; ?></td>
                                <td><?php echo $row['EmailId']; ?></td>
                                <td><?php echo $row['MobileNumber']; ?></td>
                                <td><?php echo $row['role']?></td>
                                <td>
                                    <a href="delete_manager.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm remove" onclick="return confirm('Are you sure want to delete this')"><i class="fas fa-trash-alt"></i>
                                </td>
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




