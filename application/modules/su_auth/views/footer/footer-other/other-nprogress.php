
	<script src="<?php echo base_url('assets/backend/plugins/nprogress/nprogress.js');?>"></script>
	<script>
			$('body').show();
			$('.version').text(NProgress.version);
			NProgress.inc();
			setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
	</script>