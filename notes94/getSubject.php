<?php
require_once("dropdown1.php");
$db_handle=new DBController();
if(!empty($_POST["department_id"])){
	$query="SELECT * FROM pdf_data WHERE subject='".$_POST["subject"]."' order by name asc";
	$results=$db_handle->runQuery($query);
	?>
	<option value disabled selected>Select</option>
	<?php
	foreach($results as $subject){
		?>
	<option value="<?php echo $subjet["id"];?>"><?php echo $subject["name"];?></option>
	<?php
	}
  }


?>
