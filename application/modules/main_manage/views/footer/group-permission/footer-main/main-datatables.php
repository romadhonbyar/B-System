<!-- get data ajax -->
<script type="text/javascript">
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
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "searchPlaceholder": "Ketikan di sini"
            },
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": inFo,
            "autoWidth": true
        });

    });
    /* ]]> */
</script>