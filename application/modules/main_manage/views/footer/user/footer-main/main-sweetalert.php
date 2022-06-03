<script type="text/javascript">
    function _delete(id) {
        swal(
            {title: "Hapus!", text: "Anda yakin ingin menghapusnya?", icon: "error", buttons: true, dangerMode: true}
        ).then((yes) => {
            if (yes) {
                $.ajax({
                    url: "<?php echo base_url('c_data/c_manage_user/ajax_delete/'); ?>" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        reload_table();
                    },
                    error: handleAjaxError
                });
            } else {
                swal("Tindakan dibatalkan!");
            }
        });
    }
</script>