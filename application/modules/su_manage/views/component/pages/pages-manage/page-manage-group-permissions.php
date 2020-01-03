<div class="section-body">
	<div class="row">

    <div class="col-12 col-sm-12 col-lg-12">
			<div class="card">
				<?php $attribute= array( 'autocomplete' => 'off','id'=>'reg_form','class' => '','' => ''); echo form_open($this->uri->uri_string(), $attribute);?>

					<div class="card-header">
						<?php $this->load->view('su_general/component/element/setion-body/sb-card-header-title'); ?>
					</div>
					<div class="card-body">

            <?php $this->load->view('su_general/component/element/element-message'); ?>

            <table id="table-3" class="table table-striped nowrap" style="width:100%">
							<thead>
								<tr>
									<th><?php echo lang('manage_premissions_group_form_table_permission'); ?></th>
									<th><?php echo lang('manage_premissions_group_form_table_allow'); ?></th>
									<th><?php echo lang('manage_premissions_group_form_table_deny'); ?></th>
									<th><?php echo lang('manage_premissions_group_form_table_ignore'); ?></th>
								</tr>
							</thead>
							<tbody>
							<?php if($permissions) : ?>
								<?php foreach($permissions as $k => $v) : ?>
								<tr>
									<td><?php echo $v['name']; ?></td>
									<td><?php echo form_radio("perm_{$v['id']}", '1', set_radio("perm_{$v['id']}", '1', ( array_key_exists($v['key'], $group_permissions) && $group_permissions[$v['key']]['value'] === TRUE ) ? TRUE : FALSE)); ?></td>
									<td><?php echo form_radio("perm_{$v['id']}", '0', set_radio("perm_{$v['id']}", '0', ( array_key_exists($v['key'], $group_permissions) && $group_permissions[$v['key']]['value'] != TRUE ) ? TRUE : FALSE)); ?></td>
									<td><?php echo form_radio("perm_{$v['id']}", 'X', set_radio("perm_{$v['id']}", 'X', ( ! array_key_exists($v['key'], $group_permissions) ) ? TRUE : FALSE)); ?></td>
								</tr>
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan="4">There are currently no permissions to manage, please add some permissions</td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>

					</div>
					<div class="card-footer text-right bg-whitesmoke">
						<!-- <button class="btn btn-primary">Submit</button> -->
						<button name="save" type="submit" id="save" value="true" class="pull-right btn btn-primary btn-flat btn-save">Save</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
