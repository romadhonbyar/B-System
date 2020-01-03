<?php
	$perm_key = array(
		'name'        => 'perm_key',
		'value'       => set_value('perm_key', $this->input->post('perm_key')),
		'placeholder' => lang('manage_add_permission_key_placeholder'),
		'class'       => 'form-control',
		'required'    => 'required',
		'autocomplete' => 'off',
    );
	$perm_name = array(
		'name'        => 'perm_name',
		'value'       => set_value('perm_name', $this->input->post('perm_name')),
		'placeholder' => lang('manage_add_permission_name_placeholder'),
		'class'       => 'form-control',
		'required'    => 'required',
		'autocomplete' => 'off',
    );
?>

<div class="section-body">
	<div class="row">

    <div class="col-12 col-sm-12 col-lg-12">
			<div class="card">
				<?php $attribute= array( 'autocomplete' => 'off','id'=>'reg_form','class' => 'needs-validation','novalidate' => ''); echo form_open($this->uri->uri_string(), $attribute);?>

					<div class="card-header">
						<?php $this->load->view('su_general/component/element/setion-body/sb-card-header-title'); ?>
					</div>
					<div class="card-body">

            <?php $this->load->view('su_general/component/element/element-message'); ?>

            <div class="row">
              <div class="form-group col-6">
    						<?php echo form_label(lang('manage_add_permission_key_label'), 'perm_key');?>
    						<?php echo form_input($perm_key); ?>
    						<div class="invalid-feedback">
  								Oh no! perm_key is invalid.
    						</div>
              </div>
              <div class="form-group col-6">
    						<?php echo form_label(lang('manage_add_permission_name_label'), 'perm_name');?>
    						<?php echo form_input($perm_name); ?>
    						<div class="invalid-feedback">
    							Oh no! perm_name is invalid.
                  <!-- Minimum length of 10 characters, maximum length of 50 characters -->
    						</div>
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
