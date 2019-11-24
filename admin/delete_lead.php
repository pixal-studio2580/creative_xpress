
<?php

include('common/db.php');
include("function.php");

if(isset($_POST["user_ids"]))
{
	$image = delete_lead($_POST["user_ids"]);
	$statement = $connection->prepare(
		"DELETE FROM services_list WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_ids"]
		)
	);
	
	if(!empty($result))
	{
		//echo 'Data Deleted';
	}
}
?>