<div class="section-body">
	<div class="row">

	<div class="col-12 col-sm-12 col-lg-5">
		<div class="card profile-widget">
			<div class="profile-widget-header">
				<img alt="image" src="http://www.gravatar.com/avatar/cf93a25dcc25945687bb884e87d94daa.png?s=80&r=g" class="rounded-circle profile-widget-picture">
				<div class="profile-widget-items">
					<div class="profile-widget-item">
						<div class="profile-widget-item-label">Posts</div>
						<div class="profile-widget-item-value">187</div>
					</div>
					<div class="profile-widget-item">
						<div class="profile-widget-item-label">Followers</div>
						<div class="profile-widget-item-value">6,8K</div>
					</div>
					<div class="profile-widget-item">
						<div class="profile-widget-item-label">Following</div>
						<div class="profile-widget-item-value">2,1K</div>
					</div>
				</div>
			</div>
			<div class="profile-widget-description pb-0">
				<div class="profile-widget-name">Ahmad Romadhon <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris.</p>
			</div>
		</div>
	</div>

    <div class="col-12 col-sm-12 col-lg-7">
			<div class="card">
				<?php $attribute= array( 'autocomplete' => 'off','id'=>'reg_form','class' => 'needs-validation','novalidate' => ''); echo form_open($this->uri->uri_string(), $attribute);?>

					<div class="card-header">
						<?php $this->load->view('su_general/component/element/setion-body/sb-card-header-title'); ?>
					</div>
					<div class="card-body">

            <?php $this->load->view('su_general/component/element/element-message'); ?>

						<div class="form-group">
							<?php echo lang('manage_edit_staff_fullname_label', 'full_name');?>
							<?php echo form_input($full_name); ?>
							<div class="invalid-feedback">
								Oh no! <?php echo lang('manage_edit_staff_fullname_label', 'full_name');?> is invalid.
							</div>
						</div>

            <div class="row">
              <div class="form-group col-6">
    						<?php echo lang('manage_add_staff_phone_label', 'phone');?>
    						<?php echo form_input($phone); ?>
    						<div class="invalid-feedback">
    							Oh no! <?php echo lang('manage_add_staff_phone_label', 'phone');?> is invalid.
    						</div>
              </div>
              <div class="form-group col-6">
    						<?php echo lang('manage_add_staff_email_label', 'email');?>
    						<?php echo form_input($email); ?>
    						<div class="invalid-feedback">
    							Oh no! <?php echo lang('manage_add_staff_email_label', 'email');?> is invalid.
    						</div>
              </div>
            </div>

  					<div class="form-group">
  						<?php echo lang('manage_add_staff_member_of_group_label', 'groups_select');?>
              <select class="form-control select2 custom-select" id="groups_select" name="groups_select" required="required">
                <option></option>
              </select>
  						<div class="invalid-feedback">
  							Oh no! <?php echo lang('manage_add_staff_member_of_group_label', 'groups_select');?> is invalid.
  						</div>
  					</div>

					</div>
					<div class="card-footer text-right bg-whitesmoke">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
