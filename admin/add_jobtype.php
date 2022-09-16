<?php
session_start();
include_once ('../config.php');
if(isset($_POST['add']))
{
	$jobtype = $_POST['jobtype'];
	$price = $_POST['pricing'];

	$sql="INSERT INTO addjobtype(jobtype, pricing) VALUES (?,?)";
    $stmti = $mysqli->prepare($sql);
    $stmti->bind_param('sd',$jobtype,$price);
    $stmti->execute();
    $stmti->close();
    echo "<script>alert('Job type added successfully');</script>";
	header('location:./view_jobtype.php');
}
include('../header.php'); 
include('../navbar.php'); 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-3">Add Job Type</h2>
            <div class="content-wrap">
				<form role="form" method="POST">
					<div class="form-group">
						<label for="name">Type Text</label>
						<input type="text" class="form-control" name="jobtype" id="jobtype" required="required" placeholder="Enter the text that will be shown to the user">
					</div>
					<div class="form-group mt-3">
						<label for="phone">Pricing </label>
						<input type="number" class="form-control" name="pricing" id="pricing" required="required" placeholder="Price">
					</div>
					<div class="mt-3"><button type="submit" class="btn btn-success" name="add">Add</button></div>
				</form>
            </div>
        </div>
		
    </main>
</div>
</div>

<?php include('../footer.php'); ?>
<?php include('../scripts.php'); ?>

