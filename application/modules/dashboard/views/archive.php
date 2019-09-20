<div class="container">
<div class="spacer"></div>
<h2>Tugas Terarsipkan</h2>
<div class="spacer"></div>
<div class="table-responsive col" style="margin:auto">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Activity</th>
            <th>Created at</th>
            <th>Done at</th>
            <th>Action</th>
        </tr>
        <?php  
           if($fetch_data->num_rows() > 0)  {
               $no = 1;
                foreach($fetch_data->result() as $row)  
                {
            ?>
            <tr>  
                <td><?php echo $no++; ?></td>  
                <td><?php echo $row->Todo_activity; ?></td>  
                <td><?php echo date("d F Y H:i:s", strtotime($row->Todo_created_at)); ?></td>
                <td><?php echo date("d F Y H:i:s", strtotime($row->Todo_done_at)); ?></td> 
                <td style="margin:10px;">
                    <a href="#"><i title="Delete" class="delete-data lnr lnr-trash" id="<?php echo $row->Todo_id?>"></i></a></td>  
                <td></td>  
            </tr>    
           <?php }
           }
           else {
            ?>
            <tr>  
                <td colspan="5">No Data Found</td>  
            </tr>  
        <?php   
        }
        ?>
             
    </table>
</div>
<a href="<?php echo base_url("dashboard")?>" class="btn btn-danger">Back</a>
</div>

