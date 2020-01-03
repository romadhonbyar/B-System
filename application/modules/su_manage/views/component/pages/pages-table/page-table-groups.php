<div class="section-body">
	<!-- <h2 class="section-title">This is Example Page</h2> -->
	<!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
	<div class="card">
		<div class="card-header">
			<?php $this->load->view('su_general/component/element/setion-body/sb-card-header-title'); ?>
			<div class="card-header-action">
				<div class="btn-group">
					<a href="<?php echo site_url('manage/add/groups'); ?>" class="btn btn-warning">Add</a>
					<a href="#" class="btn btn-primary" onclick="reload_table()">Refresh</a>
				</div>
			</div>
		</div>
		<div class="card-body">

			<!-- <div class="table-responsive"> -->
			<table id="table" class="table table-striped nowrap" style="width:100%">
				<!-- <table class="table table-striped" id="table"> -->
				<thead>
					<tr>
						<th><?php echo lang('manage_table_group_title_name'); ?></th>
						<th><?php echo lang('manage_table_group_title_description'); ?></th>
						<th><?php echo lang('manage_table_group_title_permission'); ?></th>
						<th><?php echo lang('manage_table_group_title_action'); ?></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			<!-- </div> -->

		</div>
		<div class="card-footer bg-whitesmoke">
			This is card footer
		</div>
	</div>
</div>
