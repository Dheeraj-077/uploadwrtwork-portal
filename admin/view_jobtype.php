<?php
session_start();
include_once ('../config.php');

$stmt = "SELECT * FROM addjobtype";
$res = $mysqli->query($stmt);
$ar1 = [];
if ($res->num_rows > 0) {
    $ar1 = $res->fetch_all(MYSQLI_ASSOC);
}
include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">View Job Type</h2>
            <div class="content-wrap">
                <table id="viewTable" class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Type Text</th>
                        <th>Pricing</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($ar1)) { $count = 1;  ?>
                        <?php ?>
                        <?php foreach($ar1 as $row) { ?>
                            <tr id="<?php echo $user['id'] ?>">
                                <td><?php echo $count ?></td>
                                <td><?php echo $row['jobtype']; ?></td>
                                <td><?php echo '$'.$row['pricing']; ?></td>
                                <td>
                                    <span class="px-2"><a class="btn btn-success" href="update_jobtype.php?id=<?php echo $row['id'];?>" ><i class="far fa-edit"></i></a></span>
                                    <span class="px-2"><a href="delete_jobtype.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm remove" onclick="return confirm('Are you sure you want to delete this item')"><i class="fas fa-trash-alt"></i></a></span>
                                </td>
                            </tr>
                        <?php $count++; } ?>
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
