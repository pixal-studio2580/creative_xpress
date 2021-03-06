<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = 'upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('common/db.php');
	$statement = $connection->prepare("SELECT image FROM event WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records()
{
	include('common/db.php');
	$statement = $connection->prepare("SELECT * FROM event");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function delete_lead($user_ids)
{
	include('common/db.php');
	$statement = $connection->prepare("SELECT * FROM services_list");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


?>

