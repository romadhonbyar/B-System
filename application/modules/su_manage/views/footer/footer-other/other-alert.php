<script type="text/javascript">
  /*$(document).on('click', '#btn-delete', function(e) {
      e.preventDefault();

      swal({
        title: "Problem found!",
        text: "Hai, Sayang!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#myForm-import').submit();
        } else {
          swal("Action canceled!");
        }
      });

  });*/

  function delete_user (id){
    swal({
      title: "Delete!",
      text: "Are you sure you want to delete it?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((yes) => {
      if (yes) {

        $.ajax({
          <?php if($url3=="users") { ?>
          url : "<?php echo base_url('c_data/c_manage_users_staff/ajax_delete/')?>" + id,
          <?php } else if($url3=="groups") { ?>
          url : "<?php echo base_url('c_data/c_manage_groups/ajax_delete/')?>" + id,
          <?php } else if($url3=="permissions") { ?>
          url : "<?php echo base_url('c_data/c_manage_permissions/ajax_delete/')?>" + id,
          <?php } ?>
  				type: "POST",
  				dataType: "JSON",
  				success: function(data) {
  					reload_table();
  				},
  				error: function () {
  					alert('Error deleting data');
  				}
  			});
      } else {
        swal("Action canceled!");
      }
    });
  }
</script>
