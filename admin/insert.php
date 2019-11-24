<?php
include('common/db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO `event` (`event_name`, `event_des`, `image`, `location`, `date`, `updated_at`, `created_at`) 
			VALUES (:event_name, :event_des, :image, :location, now(),now(),now())
		");
		$result = $statement->execute(
			array(
				':event_name'	=>	$_POST["event_name"],
				':event_des'	=>	$_POST["event_des"],
				':image'		=>	$image,
				':location'	=>	$_POST["location"]
					
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE event 
			SET event_name = :event_name, event_des = :event_des, image = :image, location = :location  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':event_name'	=>	$_POST["event_name"],
				':event_des'	=>	$_POST["event_des"],
				':location'		=>	$_POST["location"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>