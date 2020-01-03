<?php if ($message == true) { ?>

<!-- <div class="form-group"> -->
	<div class="alert alert-warning alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $message; ?>
		</div>
	</div>
<!-- </div> -->
<?php } ?>
<?php if ($this->session->flashdata('success') == true) { ?>

<!-- <div class="form-group"> -->
	<div class="alert alert-success alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } ?>
<?php if ($this->session->flashdata('danger') == true) { ?>

<!-- <div class="form-group"> -->
	<div class="alert alert-danger alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('danger'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } ?>
<?php if ($this->session->flashdata('warning') == true) { ?>

<!-- <div class="form-group"> -->
	<div class="alert alert-warning alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('warning'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } ?>
