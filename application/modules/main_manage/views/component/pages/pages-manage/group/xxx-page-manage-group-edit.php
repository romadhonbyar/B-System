<div class="section-body">
	<div class="row">

    <div class="col-12 col-sm-12 col-lg-12">
			<div class="card">
				<?php $attribute= array( 'autocomplete' => 'off','id'=>'vaForm','class' => 'needs-validation','novalidate' => ''); echo form_open($this->uri->uri_string(), $attribute);?>

					<div class="card-header">
						<?php $this->load->view('template_backend/component/element/section-body/sb-card-header-title'); ?>
					</div>
					<div class="card-body">

            <?php $this->load->view('template_backend/component/element/element-message'); ?>

            <div class="row">
              <div class="form-group col-6">
    						<?php echo lang('manage_add_group_name_label', 'group_name');?>
    						<?php echo form_input($group_name);?>
    						<div class="invalid-feedback">
  								Oh no! group name is invalid.
    						</div>
              </div>
              <div class="form-group col-6">
    						<?php echo lang('manage_add_group_description_label', 'description');?>
    						<?php echo form_textarea($group_description);?>
    						<div class="invalid-feedback">
    							Oh no! group description is invalid.
                  <!-- Minimum length of 10 characters, maximum length of 50 characters -->
    						</div>
              </div>
            </div>

					</div>
					<div class="card-footer text-right bg-whitesmoke">
						<button class="btn btn-warning btn-block btn-submit-load">Suting</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
