<?php
session_start();
include_once ('../config.php');

$id = $_GET['id'];
$stmt = "SELECT * FROM addjobtype where id = $id";
$output = $mysqli ->query($stmt);
$row2 = $output->fetch_assoc();

if (isset($_POST['update'])){
    $jobtype = $_POST['jobtype'];
	$price = $_POST['pricing'];

    $sql1 = "UPDATE addjobtype SET jobtype='$jobtype',pricing='$price' WHERE id=$id";

    if (mysqli_query($mysqli, $sql1)) {
      echo "Record updated successfully";
      header('location:./view_jobtype.php');

    } else {
      echo "Error updating record: " . mysqli_error($mysqli);
    }
    

}

include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">Update Job Type</h2>
            <div class="content-wrap">
            
                <form role="form" method="POST">
					<div class="form-group">
						<label for="name">Type Text</label>
						<input type="text" class="form-control" name="jobtype" id="jobtype" value="<?php echo $row2['jobtype'];?>" />
					</div>
					<div class="form-group mt-3">
						<label for="phone">Pricing </label>
						<input type="number" class="form-control" name="pricing" id="pricing" value="<?php echo $row2['pricing'];?>" />
					</div>
					<div class="mt-3"><button type="submit" class="btn btn-success" name="update">Update</button></div>
			    </form>
           
            </div>
        </div>
    </main>
</div>
</div>

<?php include('../footer.php'); ?>
<?php include('../scripts.php'); ?>


<script>
    $(document).ready(function() {
    $('#userTable').DataTable();
} );
</script>