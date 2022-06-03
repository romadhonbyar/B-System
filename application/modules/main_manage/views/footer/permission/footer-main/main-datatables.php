<!-- get data ajax -->
<script type="text/javascript">
    function reload_table() {
        table
            .ajax
            .reload(null, false);/* reload datatable ajax  */
    }

    function reload_page() {
        location.reload();/* reload page ajax  */
    }

    <?php if ($this->agent->is_mobile()) { ?>
    var pagIng = "full";
    var inFo = false;
    <?php } else { ?>
    var pagIng = "full_numbers";
    var inFo = true;
    <?php } ?>

    /*<![CDATA[ */
    var save_method;/* for save method string */
    var table;
    $(document).ready(function () {
        table = $('#table').DataTable({
            "pagingType": pagIng,
            "responsive": true,
            "pageLength": 5,
            "lengthMenu": [
                [
                    3,
                    5,
                    10,
                    25,
                    50,
                    100,
                    -1
                ],
                [
                    3,
                    5,
                    10,
                    25,
                    50,
                    100,
                    "Semua"
                ]
            ],
            "processing": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "searchPlaceholder": "Ketikan di sini"
            },
            "serverSide": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": inFo,
            "autoWidth": true,
            "stateSave": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url('c_data/c_manage_permission/ajax_list') ?>",
                "type": "POST",
                "error": handleAjaxError
            },
            "columnDefs": [
                {
                    /*"targets": [-1],*/
                    "orderable": false,
                    "searchable": false,
                    "orderable": false,
                    "visible": true
                }
            ]
        });
    });
    /* ]]> */
</script>