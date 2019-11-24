<?php
    include('admin/common/db.php');
    
    $query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $number_of_rows = $statement->rowCount();
    $output = '';
    $output .= ' <div class="grid"> <div class="grid-sizer"></div>
    
    ';
if($number_of_rows > 0)
    {
        $count = 0;
        foreach($result as $row)
    {
        $count ++; 
        // $output .= ' 
        // <div class="grid-item"><img src="admin/gallery/files/'.$row["image_name"].'" data-tags="'.$row["image_description"].'"></div>
        // ';

        $output .= ' 
        <li class><img src="admin/gallery/files/'.$row["image_name"].'" data-tags="'.$row["image_description"].'"></li    >
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

    $output .= '</div>';
    echo $output;
?>
