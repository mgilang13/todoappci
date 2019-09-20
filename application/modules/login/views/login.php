
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<?php
					if($this->session->flashdata('message')) {
						echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
					}
                ?>
				<form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>login/validation">
					<span class="login100-form-title p-b-55">
						Login
					</span>
					<span class="text-danger"><?php echo form_error('email'); ?></span>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>
					<span class="text-danger"><?php echo form_error('password'); ?></span>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="<?php echo base_url("register")?>">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
