<!-- <body class="hold-transition register-page" style='display: none'> -->
<body class="hold-transition register-page">
	<div class='fade out'>
		<div class="register-box">
			<!--
			<div class="register-logo">
				<a href="../../index2.html"><b>Register</b> Member</a>
			</div>
			-->

			<div class="register-box-body">
				<p class="login-box-msg">Register a new membership</p>
				<?php //$this->load->view('su_auth/component/elemen/elemen-message'); ?>
				
				<?php if($this->form_validation->run() == TRUE){$error = "has-error has-danger";}else{$error = FALSE;} ?>
				<div id="message">
				
				<form action="javascript:void(0);" 
				autocomplete="off" id="reg_form_reg" class="reg_form_reg" data-toggle="validator"
				method="post" accept-charset="utf-8">
					<div id="e_full_name_a" class="form-group has-feedback">
						<input type="text" class="form-control" 
							placeholder="Full name" 
							name="full_name"
							value="<?php echo $this->form_validation->set_value('full_name')?>"
							required >
						<span class="fa fa-user form-control-feedback"></span>
						<div id="e_full_name_b" class="help-block with-errors"></div>
					</div>
					<div id="e_identity_a" class="form-group has-feedback">
						<input type="text" class="form-control" 
							placeholder="Username" 
							name="identity"
							required >
						<span class="fa fa-user form-control-feedback"></span>
						<div id="e_identity_b" class="help-block with-errors"></div>
					</div>
					<div id="e_email_a" class="form-group has-feedback">
						<input type="email" class="form-control" 
						       placeholder="Email" 
							   name="email"
							   required >
						<span class="fa fa-envelope form-control-feedback"></span>
					 	<div id="e_email_b" class="help-block with-errors"></div>
					</div>
					<div id="e_password_a" class="form-group has-feedback">
						<input type="password" class="form-control" 
						       placeholder="Password" 
							   name="password"
							   required >
						<span class="fa fa-lock form-control-feedback"></span>
					 	<div id="e_password_b" class="help-block with-errors"></div>
					</div>
					<div id="e_password_confirm_a" class="form-group has-feedback">
						<input type="password" class="form-control" 
						       placeholder="Retype password" 
							   name="password_confirm"
							   required >
						<span class="fa fa-sign-in form-control-feedback"></span>
					 	<div id="e_password_confirm_b" class="help-block with-errors"></div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<div class="checkbox icheck">
								<label>
									<?php echo form_checkbox('agree', '1', FALSE, 'id="agree"');?> I agree to the <a href="#">terms</a>
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
						</div>
						<!-- /.col -->
					</div>
				<?php echo form_close();?>

				<a href="<?php echo site_url('login');?>" class="text-center">I already have a membership</a>
			</div>
			<!-- /.form-box -->
		</div>
		<!-- /.register-box -->
    </div>
	<!-- /.fade out -->
	<style>
html {
    overflow: none;
    overflow-x: hidden;
}
	</style>