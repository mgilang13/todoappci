
<div class="contaienr">
<form class="col-md-6 form-update" method="post" action="<?php echo base_url("dashboard/updateProcess")?>">

    <div class="form-group myform">
    <input type="text" name="todo_id" value="<?php echo $todos->Todo_id?>">
		<input value=<?php echo $todos->Todo_activity; ?> name="Todo_activity" type="text" class="todo-form form-control">
        <div class="row">
            <input type="submit" value="Update" class="btn btn-success">
            <a href="<?php echo base_url("dashboard"); ?>" class="btn btn-warning btn-back">Back</a>
        </div>
    </div>
</form>
</div>