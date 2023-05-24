<?php 
SESSION_START();
if(!isset($_SESSION['email'])){
  	header("Location: index.php");  	
}
else{
	if(($_SESSION['type'])=='student'){ 
       header("Location:studentportal.php");
     }




include 'dbcon.php';
//SESSION_START();
$user_email=$_SESSION['email'];
  $query= "select * from std_signup where email= '$user_email'";
    $data= mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($data);
    $username="";
    if($rowcount==1)
    {
    	$row=mysqli_fetch_array($data);
    	$username=$row["name"];
    	
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">


<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	

</head>
<body>
	<div style="height: 50px; width: 100%; background-color: #619cfa;">
	<form action="logout.php" style="float: right;margin-top: 5px; margin-right:20px;">
		<button class="active btn btn-primary">Logout</button>
	</form>
	</div>
	<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
			<strong>Welcome <?php echo $username; ?> Upload your Notes</strong>
				<form method="post" enctype="multipart/form-data" name="f1">
					<?php
						// If submit button is clicked
						if (isset($_POST['submitt']))
						{
						// get name from the form when submitted
						$name = $username;
						$subject=$_POST['subject'];			

						if (isset($_FILES['pdf_file']['name']))
						{
							

						// If the ‘pdf_file’ field has an attachment
							$file_name = $_FILES['pdf_file']['name'];
							$file_tmp = $_FILES['pdf_file']['tmp_name'];
							
							$query= "select * from pdf_data where filename = '$file_name'";
    						$data= mysqli_query($con,$query);
    						$rowcount=mysqli_num_rows($data);
						    if($rowcount==1)
						    {
						    	?> 
						    	<script type="text/javascript">
						    		alert("This file already exist....!!");
						    	</script>
						    	<?php
						    	
						    }
						    else{
							// Move the uploaded pdf file into the pdf folder
							move_uploaded_file($file_tmp,"./pdf/".$file_name);
							// Insert the submitted data from the form into the table
							$insertquery =
							"INSERT INTO pdf_data(username,filename,email,subject) VALUES('$name','$file_name','$user_email','$subject')";
							
							// Execute insert query
							$iquery = mysqli_query($con, $insertquery);	

								if ($iquery)
							{							
					?>											
								
									<script type="text/javascript">
										alert("Notes Uploaded...!!");
									</script>
								
								<?php
								}
								else
								{
								?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Failed!</strong> Try Again!
								</div>
								<?php
								}
							}
							}
							else
							{
							?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
								<a class="close" data-dismiss="alert" aria-label="close">
									×
								</a>
								<strong>Failed!</strong> File must be uploaded in PDF format!
								</div>
							<?php
							}// end if
						}// end if
					?>
					
					<div class="form-input py-2">
							<div class="form-group">
							<input type="text" name="subject"
								class="form-control" placeholder="Subject Name" required />
						</div>						
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" accept=".pdf" required />
						</div>
						<div class="form-group">
							 <button type="submit" name="submitt" class="active btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>		
			
			<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h4>Notes uploaded by you</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>
							<th>ID</th>
							<th>Subject</th>
							<th>File Name</th>
							<th>Delete</th>
						</thead>
						<tbody>
						<?php
							$selectQuery = "select * from pdf_data where email='$user_email'";
							$squery = mysqli_query($con, $selectQuery);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $result['subject']; ?></td>
							<td><?php echo '<a href="display_pdf.php?id='.$result['id'].'&name=' . $result['filename'] .'">'.$result['filename'].'</a>' ; ?> </td>
							<td><?php echo '<a href="deleteNotes.php?id='.$result['id'].'&name=' . $result['filename'] .'">'."Delete".'</a>' ; ?> </td>
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
	</div>
</body>
</html>
<?php }
?>