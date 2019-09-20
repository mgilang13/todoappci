
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            Selamat datang, <b><?php echo $this->session->userdata('nama') ?></b>
        </div>
        <div class="card-body">
            <h5 class="card-title">Apa yang akan kamu lakukan hari ini?</h5>
            <p class="card-text">“Masa Lalu Selamanya Tidak Akan Pernah Menang, Karena Ia Selalu Ada Di Belakang.” (Tere Liye)</p>
        </div>
        <div class="spacer"></div>

        <form class="col-md-6 form-inline" method="post" action="<?php echo base_url("dashboard/insert")?>">
            <div class="form-group row myform">
                <input name="Todo_activity" type="text" class="todo-form form-control" placeholder="WHAT WILL YOU DO?">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
        
        <div class="card-footer text-muted">
            <a href="<?php echo base_url("dashboard/show_done")?>" class="btn btn-primary">Show Done Task</a>
            <a href="<?php echo base_url("dashboard/show_archive")?>" class="btn btn-info">Show Archived Task</a>
        </div>
        
    </div>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Activity</th>
            <th>Created at</th>
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
                <td style="margin:10px;">
                    <a href="<?php echo base_url('dashboard/doneclick/'.$row->Todo_id)?>"><i title="Done" class="lnr lnr-checkmark-circle"></i></a>&nbsp;&nbsp;
                    <a href="<?php echo base_url('dashboard/edit/'.$row->Todo_id); ?>"><i title="Edit" class="lnr lnr-pencil"></i></a>&nbsp; &nbsp;
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

<a class="btn btn-danger" href="<?php echo base_url("dashboard/logout")?>">Logout</a>
</div>

