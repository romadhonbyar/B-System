  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('assets/backend/base/js/stisla.js'); ?>"></script>

	<!-- Ajax CRUD -->
	<?php if ($url1 == "manage" && $url2 == "list") {$this->load->view('su_manage/footer/footer-other/other-ajax-crud');} ?>
	<?php if ($url1 == "manage" && ($url2 == "add" or $url2 == "edit") && $url3 == "users") {$this->load->view('su_manage/footer/footer-other/other-data-select2');} ?>
  <?php if ($url2 == "list") {$this->load->view('su_manage/footer/footer-other/other-alert');} ?>

  <!-- JS Libraies -->
  <?php if ($url1 == "manage" && ($url2 == "list" or $url2 == "permissions")) { ?>
  <script src="<?php echo base_url('assets/backend/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"></script>

  <script>
    $('#table-3').DataTable({
  		"pagingType": "full_numbers",

  		"responsive": true,
      "pageLength": 3,
  		"lengthMenu": [ 3, 5, 10, 25, 50, 75, 100 ],

  		"lengthChange": true,
  		"searching": true,
  		"ordering": true,
  		"info": true,
    	"autoWidth": true,
    });
    </script>
  <?php }  ?>
  <script src="<?php echo base_url('assets/backend/plugins/sweetalert/dist/sweetalert.min.js'); ?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/backend/base/js/scripts.js'); ?>"></script>
  <?php if ($url1 == "manage" && ($url2 == "list" or $url2 == "permissions")) { ?><script src="<?php echo base_url('assets/backend/base/js/custom.js'); ?>"></script><?php } ?>

  <!-- Page Specific JS File -->
</body>
</html>
