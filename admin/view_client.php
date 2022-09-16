<?php
session_start();
include_once ('../config.php');

$sql = "SELECT * FROM tblusers ";
$result = $mysqli->query($sql);
$resarr = [];
if ($result->num_rows > 0) {
    $resarr = $result->fetch_all(MYSQLI_ASSOC);
}

include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">View Clients</h2>
            <div class="content-wrap">
                <table id="viewTable" class="table table-bordered table-responsive">
                <thead>
                    <th>Id</th>
                    <th>FullName</th>
                    <th>Email Id</th>
                    <th>Mobile No.</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if(!empty($resarr)) { ?>
                        
                        <?php foreach($resarr as $row) { ?>
                            <?php if($row['role']== "client") { ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['FullName']; ?></td>
                                <td><?php echo $row['EmailId']; ?></td>
                                <td><?php echo $row['MobileNumber']; ?></td>
                                <td>
                                    <a href="delete_client.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm remove" onclick="return confirm('Are you sure you want to delete this item')"><i class="fas fa-trash-alt"></i>
                                </td>
                            </tr>
                            <?php } ?>
                                                            
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




