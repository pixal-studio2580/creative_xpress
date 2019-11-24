<?php
//delete.php

include('../common/db.php');

if(isset($_POST["image_id"]))
{
 $file_path = 'files/' . $_POST["image_name"];
 if(unlink($file_path))
 {
  $query = "DELETE FROM tbl_image WHERE image_id = '".$_POST["image_id"]."'";
  $statement = $connection->prepare($query);
  $statement->execute();
 }
}

?>