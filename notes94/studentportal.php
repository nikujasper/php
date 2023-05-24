<?php 
SESSION_START();
if(!isset($_SESSION['email'])){
  	header("Location: index.php");  	
}
else{
	if(($_SESSION['type'])=='teacher'){ 
       header("Location:teacherportal.php");
     }
         
	require_once("dropdown1.php");
	$db_handle=new DBController();
	$query="SELECT distinct subject FROM pdf_data";
	$results=$db_handle->runQuery($query);

	$subject= "";
 
        // Checking for a POST request
        if(isset($_POST['submit'])) {
          $subject = $_POST["subject"];
          
        }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Portal</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div style="height: 50px; width: 100%; background-color: #619cfa;">
	<form action="logout.php" style="float: right;margin-top: 5px; margin-right:20px;">
		<button class="active btn btn-primary">Logout</button>
	</form>
	</div>
	<br>
	<br>
<div class="container">
	 <form method="post" action="">
			<div class="row">

				<div class="col-sm-4">
					<div class="form-group">
						<label>Subject:</label>
						<select name="subject" id="subject-list" class="InputBox" onChange="getSubject(this.value);">
							<option value seleted>-select-</option>
							<?php
							foreach($results as $sub){
								?>
							<option value="<?php echo $sub["subject"];?>"><?php echo $sub["subject"];?></option>
							<?php 
						}
						?>

						</select>
					</div>
				</div>
				
				

				<div class="col-sm-4">
					<div class="form-group">
						
						<button type="submit" name="submit" class="btn btn-primary" style="margin-left: 10px;" id="getNotes">Get Notes</button>
					</div>
				</div>
			</div>
			
		</form>
	</div>
	<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h4>Available Notes</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>
							<th>ID</th>
							<th>Subject</th>
							<th>Teacher Name</th>
							<th>File Name</th>
						</thead>
						<tbody>
						<?php
						 include 'dbcon.php';
							$selectQuery = "select * from pdf_data where subject='$subject'";
							$squery = mysqli_query($con, $selectQuery);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $result['subject']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo '<a href="display_pdf.php?id='.$result['id'].'&name=' . $result['filename'] .'">'.$result['filename'].'</a>' ; ?> </td>
						</tr>
						<?php
							}
						?>
						</tbody>
					</table>			
					</div>
				</div>
			</div>
		</div>

<div style="height: 100px;">
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>
<footer>
	<?php require_once("footer.php"); ?>
</footer>
</html>

<?php 
}
?>