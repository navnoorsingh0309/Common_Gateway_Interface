<!--Save File on Server side using PHP-->
<?php

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	//Saving Photo
	move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
?>
