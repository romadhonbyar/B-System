<script>
    var modal_body_ = '';

    <?php
    $modal_body_ =
    "modal_body_ += '<form action=\"#\" id=\"form-permission-add\" class=\"needs-validation\" novalidate=\"\" method=\"POST\" accept-charset=\"utf-8\" enctype=\"multipart/form-data\">';

    modal_body_ +=    '     <div class=\"row\">';
    modal_body_ +=    '        <div class=\"form-group col-lg-12 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '           <label for=\"inputPermKey\">Kunci hak akses</label>';
    modal_body_ +=    '           <input type=\"text\" name=\"inputPermKey\" id=\"inputPermKey\" class=\"form-control\" placeholder=\"Masukkan kunci hak akses\" required=\"required\" pattern=\"^[a-zA-Z0-9-_]+$\"/>';
    modal_body_ +=    '           <div class=\"form-text text-muted\">Hanya boleh memasukkan alphabet dan tanda pisah ( <b>-</b> atau <b>_</b> ).</div>';
    modal_body_ +=    '           <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '        </div>';
    modal_body_ +=    '     </div>';

    modal_body_ +=    '     <div class=\"row\">';
    modal_body_ +=    '        <div class=\"form-group col-lg-12 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '           <label for=\"inputPermName\">Nama hak akses</label>';
    modal_body_ +=    '           <input type=\"text\" name=\"inputPermName\" id=\"inputPermName\" class=\"form-control\" placeholder=\"Nama hak akses\" required=\"required\" pattern=\"^[a-zA-Z ]*$\"/>';
    modal_body_ +=    '           <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '        </div>';
    modal_body_ +=    '     </div>';

    modal_body_ +=    '</form>';
    modal_body_ +=    '';
    ";

    echo $modal_body_;

    ?>

    /** Handle Validator */
    $(function() {
        /** create one instance for handler: */
        var myHandler = function(e) {
            $('#form-permission-add').validator();
        };

        /** Bind it: */
        $('#form-permission-add').on('keyup change', function(e) {
            myHandler(e);
        });
    });

    $('#modal-create-permission').fireModal({
        title: 'Tambah hak akses',
        footerClass: 'bg-whitesmoke',
        body: modal_body_,
        created: function(modal) {
            modal.find('.modal-footer').prepend(
                '<button type=\"button\" class=\"btn btn-secondary\" id=\"cancelBtn\" data-dismiss=\"modal\" onclick=\"reload_page()\">Batal</button>'
            );
            /* modal.find('.modal-md').toggleClass('modal-lg'); */
        },
        autoFocus: false,
        center: true,
        onFormSubmit: function(modal, e, form) {

            $('#form-permission-add').addClass('was-validated');
            $('.input-form-data').addClass('has-danger has-error');

            /** Form Data */
            let form_data = $(e.target).serialize();
            console.log(form_data);

            var formData = new FormData(this);
            console.log(formData);

            if (e.isDefaultPrevented()) {
                console.log('Hello');
            } else {
                $.ajax({
                    url: '<?php echo base_url('manage/permission/add')?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    /** Data text, HTML, json etc. */
                    success: function(response) {
                        $('#submitBtn').prop("disabled", true);
                        $('#submitBtn').addClass("not-allowed ");

                        $('#cancelBtn').prop("disabled", true);
                        $('#cancelBtn').addClass("not-allowed ");

                        if (response.status) {
                            $('.modal').removeClass('modal-progress');
                            var alert = response.type;
                            reload_table();

                            window.setTimeout(function() {
                                /** RESET FORM */
                                /** modal.find('#form-permission-add')[0].reset(); Reset all form input */
                                $("input[name$='inputPermKey").val('');
                                $("input[name$='inputPermName").val('');

                                /** REMOVE RED COLOR */
                                $('div.input-form-data').removeClass('has-danger has-error');
                                $('#form-permission-add').removeClass('was-validated');
                            }, 5000);
                        } else {
                            $('.modal').removeClass('modal-progress');
                            var alert = response.type;
                        }

                        modal
                            .find('.modal-body')
                            .prepend(
                                '<div id="alert-validation" class="alert alert-' + alert +
                                ' alert-dismissible show fade"><div class="al' +
                                'ert-body"><button class="close" data-dismiss="alert"><span>&times;</span>' +
                                '</button>' + response.message + '</div></div>'
                            );
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        handleAjaxError(XMLHttpRequest, textStatus, errorThrown);
                        //console.log('Status: ' + textStatus);
                        //console.log('Error: ' + errorThrown);
                        //console.log('XMLHttpRequest: ' + XMLHttpRequest);
                        $('.modal').removeClass('modal-progress');
                    },

                    cache: false,
                    contentType: false,
                    processData: false
                });
            }

            $(document).ready(function() {
                window.setTimeout(function() {
                    $('.alert')
                        .fadeTo(1000, 0)
                        .slideUp(1000, function() {
                            $(this).remove();
                        })
                }, 5000);

                window.setTimeout(function() {
                    $('#submitBtn').removeAttr('disabled');
                    $('#submitBtn').removeClass("not-allowed");

                    $('#cancelBtn').removeAttr('disabled');
                    $('#cancelBtn').removeClass("not-allowed");
                }, 5000);

            });

            e.preventDefault();
        },
        shown: function(modal, form) {
            console.log(form);
        },
        buttons: [{
            text: 'Simpan',
            submit: true,
            class: 'btn btn-success btn-submit-load',
            id: 'submitBtn',
            handler: function(modal) {
                console.log('masuk buttons');
            }
        }]
    });

    $('.modal').attr('data-keyboard', 'false');
    $('.modal').attr('data-backdrop', 'static');
    $('.modal').removeClass('fade');

    /** jQuery Tambahan */
    /** =============== */
    $(document).ready(function() {
        
    });
</script>
