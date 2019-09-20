
	<?php //echo $script_captcha; // javascript recaptcha ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>register/validation">
					<span class="login100-form-title p-b-55">
						Register Form
					</span>

                    <div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="fullname" placeholder="Full Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
                    </div>
                    
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="nohp" placeholder="No. HP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-smartphone"></span>
						</span>
					</div>

                    <!-- <div class="form-group">
                        <?php echo $captcha // tampilkan recaptcha ?>
                    </div>  -->

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Have an account?
						</span>

						<a class="txt1 bo1 hov1" href="<?php echo base_url("login")?>">
							Sign in now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
