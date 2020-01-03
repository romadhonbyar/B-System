<!-- get data ajax -->
<script type="text/javascript">
	function reload_table(){
		table.ajax.reload(null,false); /* reload datatable ajax  */
	}
	function reload_page(){
		location.reload(); /* reload page ajax  */
	}

/*<![CDATA[ */
	var save_method; /* for save method string */
    var table;
    $(document).ready(function() {
		table = $('#table').DataTable({
			<?php if ($this->agent->is_mobile()) { ?>
			"pagingType": "full",
			<?php } else { ?>
			"pagingType": "full_numbers",
			<?php } ?>

			"responsive": true,
            "pageLength": 3,
			"lengthMenu": [ 3, 5, 10, 25, 50, 75, 100 ],
			"processing": true, /* Feature control the processing indicator., */
			"language": {
				//"processing": "<img height='53' width='53' src='<?php echo base_url('assets/backend/base/adminlte/dist/img/load.gif'); ?>' />", /* add a loading image,simply putting <img src="loader.gif" /> tag. */
				"searchPlaceholder": "Search records",
			},
			"serverSide": true, /* Feature control DataTables' server-side processing mode. */

			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			"stateSave": true,

			"order": [], /* Initial no order. */

			/* Load data for the table's content from an Ajax source */
			"ajax": {

			<?php if ($url1 == "manage" && $url2 == "list" && $url3 == "users") { ?> "url": "<?php echo base_url('c_data/c_manage_users_staff/ajax_list') ?>",
			<?php } elseif ($url1 == "manage" && $url2 == "list" && $url3 == "groups") { ?> "url": "<?php echo base_url('c_data/c_manage_groups/ajax_list') ?>",
			<?php } elseif ($url1 == "manage" && $url2 == "list" && $url3 == "permissions") { ?> "url": "<?php echo base_url('c_data/c_manage_permissions/ajax_list') ?>",
			<?php } ?>

				"type": "POST",
				/* success: function(data) { alert("succsess") }, */
				"error": handleAjaxError, /*function(ts) { alert(ts.responseText) }*/
			},
			/* Set column definition initialisation properties. */
			"columnDefs": [
				{
					"targets": [ -1 ], /* last column */
					"orderable": false, /* set not orderable */
					"searchable": false,
					"orderable": false,
					"visible": true
				},
			],
		});
    });

	/** Handel error */
	function handleAjaxError( xhr, textStatus, error ) {
		console.log(error);
		if ( textStatus === 'timeout' ) {
			alert( 'The server took too long to send the data.' );
		} else {
			alert('An error occurred on the server. Please try again in a minute.') ? "" : location.reload();
		}
		/** myDataTable.fnProcessingIndicator( false ); */
	}

/* ]]> */
</script>
