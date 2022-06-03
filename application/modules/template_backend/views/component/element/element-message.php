<?php
$message = '';
if ($this->session->flashdata('message') == true) {?>

<!-- <div class="form-group"> -->
	<div id="alert-validation" class="alert alert-warning alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('message');?>
		</div>
	</div>
<!-- </div> -->
<?php } else if (validation_errors() == true) { ?>

<!-- <div class="form-group"> -->
	<div id="alert-validation" class="alert alert-warning alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo validation_errors(); ?>
		</div>
	</div>
<!-- </div> -->
<?php } elseif ($this->session->flashdata('success') == true) { ?>

<!-- <div class="form-group"> -->
	<div id="alert-validation" class="alert alert-success alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } elseif ($this->session->flashdata('danger') == true) { ?>

<!-- <div class="form-group"> -->
	<div id="alert-validation" class="alert alert-danger alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('danger'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } elseif ($this->session->flashdata('warning') == true) { ?>

<!-- <div class="form-group"> -->
	<div id="alert-validation" class="alert alert-warning alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('warning'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } elseif ($this->session->flashdata('info') == true) { ?>

<!-- <div class="form-group"> -->
	<div id="alert-validation" class="alert alert-info alert-dismissible show fade">
		<div class="alert-body">
			<button class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<?php echo $this->session->flashdata('info'); ?>
		</div>
	</div>
<!-- </div> -->
<?php } ?>
