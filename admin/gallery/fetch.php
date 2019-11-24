<?php
    include('../common/db.php');
    $query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $number_of_rows = $statement->rowCount();
    $output = '';
    $output .= '
    <table class="table table-bordered table-striped">
        <tr>
        <th width="5%">Sr. No</th>
        <th width="10%">Image</th>
        <th width="10%">Name</th>
        <th width="10%">Tag</th>
        <th width="10%">Edit</th>
        <th width="10%">Delete</th>
    </tr>
    ';
if($number_of_rows > 0)
    {
        $count = 0;
        foreach($result as $row)
    {
        $count ++; 
        $output .= '
        <tr>
            <td>'.$count.'</td>
            <td><img src="files/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
            <td>'.$row["image_name"].'</td>
            <td>'.$row["image_description"].'</td>
            <td><button type="button" class="btn btn-warning btn-xs edit" id="'.$row["image_id"].'">Edit</button></td>
            <td><button type="button" class="btn btn-danger btn-xs delete" id="'.$row["image_id"].'" data-image_name="'.$row["image_name"].'">Delete</button></td>
        </tr>
        ';
        }
    }
    else
        {
        $output .= '
            <tr>
            <td colspan="6" align="center">No Data Found</td>
            </tr>
            ';
        }

    $output .= '</table>';
    echo $output;
?>