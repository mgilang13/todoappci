	
	

	
<!--===============================================================================================-->	
  	<script src="<?php echo base_url("assets/login/vendor/jquery/jquery-3.2.1.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login/vendor/bootstrap/js/popper.js")?>"></script>
	<script src="<?php echo base_url("assets/login/vendor/bootstrap/js/bootstrap.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login/vendor/select2/select2.min.js")?>"></script>
<!--===============================================================================================-->
<script>  
    $(document).ready(function(){  
        $('.delete-data').click(function(){  
            var id = $(this).attr("id");  
            if(confirm("Are you sure you want to delete this?"))  
            {  
                    window.location="<?php echo base_url(); ?>dashboard/delete/"+id;  
            }  
            else  
            {  
                    return false;  
            }  
        });  
    });  
</script>  
</body>
</html>