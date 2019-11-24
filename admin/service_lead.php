<?php
    require_once('common/config.php');
    $sql = "SELECT service.*,services_list.service_name, services_list.created_at FROM `service` LEFT JOIN services_list ON service.services = services_list.id  ORDER BY `id` DESC";
    $qry = mysqli_query($link,$sql);

?>
<script>
   
    $(document).ready(function() {
        $('#service_lead_table').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );
</script>

<div class="col-md-12 float-left mt_10 p_20 bg_white">    
    <table id="service_lead_table" class="display table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Service</th>
                <th>Posted On
            </tr>
        </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($qry) > 0) {
                    while($row = mysqli_fetch_assoc($qry)) {
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo  $row['phone'];?></td>
                    <td><?php echo  $row['email'];?></td>
                    <td><?php echo  $row['service_name'];?></td>
                    <td><?php echo  $row['created_at'];?></td>
                </tr>
                <?php
                    }
                }else{
                ?>
                    <tr>
                    <td colspan="5">Data not found</td>
                    <?php
                }
                ?>
            </tbody>    
    </table>

</div>
