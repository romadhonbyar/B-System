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

    <?php if ($url3 == "list") { ?>
    var urlAjax = "<?php echo base_url('c_data/c_manage_group/ajax_list') ?>";
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
            "stateSave": false,
            "order": [],
            "ajax": {
                "url": urlAjax,
                "type": "POST",
                "error": handleAjaxError
            },
            "columnDefs": [
                {
                    /*"targets": [-1],*/
                    "orderable": false,
                    "searchable": false,
                    "orderable": false,
                    "visible": true,
                    
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                },
                {
                    "targets": 0, // your case first column
                    "className": "text-center",
                    "width": "4%"
                }
            ],
            'select': {
                'style': 'multi'
            },
        });



        // Handle form submission event 
        $('#frm-example').on('submit', function(e){
            var form = this;
            
            var rows_selected = table.column(0).checkboxes.selected();
            console.log(rows_selected);

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element 
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId)
                );
            });

            // FOR DEMONSTRATION ONLY
            // The code below is not needed in production
            
            // Output form data to a console     
            $('#example-console-rows').text(rows_selected.join(","));
            
            // Output form data to a console     
            $('#example-console-form').text($(form).serialize());
            
            // Remove added elements
            $('input[name="id\[\]"]', form).remove();
            
            // Prevent actual form submission
            e.preventDefault();
        });  
    });
    /* ]]> */
</script>

<style>
th.dt-center, td.dt-center { text-align: center; }
</style>