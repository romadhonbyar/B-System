<script>
    var modal_body_ = '';

    <?php
    $modal_body_ =
    "modal_body_ += '<form action=\"#\" id=\"form-user-add\" class=\"needs-validation\" novalidate=\"\" method=\"POST\" accept-charset=\"utf-8\" enctype=\"multipart/form-data\">';

    modal_body_ +=    '<div class=\"row\">';
    modal_body_ +=    '   <div class=\"form-group col-lg-5 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '      <label for=\"inputUserName\">Nama Pengguna <small>(User_name)</small></label>';
    modal_body_ +=    '      <input type=\"text\" name=\"inputUserName\" id=\"inputUserName\" class=\"form-control\" placeholder=\"Nama pengguna\" required=\"required\" pattern=\"^[a-zA-Z0-9_.-]*$\"/>';
    modal_body_ +=    '      <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '   </div>';

    modal_body_ +=    '   <div class=\"form-group col-lg-7 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '      <label for=\"inputUserFullName\">Nama Lengkap Pengguna</label>';
    modal_body_ +=    '      <input type=\"text\" name=\"inputUserFullName\" id=\"inputUserFullName\" class=\"form-control\" placeholder=\"Nama lengkap pengguna\" required=\"required\" pattern=\"^[a-zA-Z ]*$\"/>';
    modal_body_ +=    '      <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '   </div>';
    modal_body_ +=    '</div>';

    modal_body_ +=    '<div class=\"row\">';
    modal_body_ +=    '   <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '      <label for=\"inputUserPhone\">Nomor Handphone <small><i>(Contoh: 0897859xxxx)</i></small></label>';
    modal_body_ +=    '      <input type=\"text\" name=\"inputUserPhone\" id=\"inputUserPhone\" class=\"form-control phone-number\" placeholder=\"Nomor Handphone\" required=\"required\">';
    modal_body_ +=    '      <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '   </div>';
    modal_body_ +=    '   <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '      <label for=\"inputUserEmail\">Surat Elektronik (E-mail) <small><i>(Contoh: username@domain.com)</i></small></label>';
    modal_body_ +=    '      <input type=\"email\" name=\"inputUserEmail\" id=\"inputUserEmail\" class=\"form-control\" placeholder=\"Surat Elektronik (E-mail)\" required=\"required\" pattern=\"^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\">';
    modal_body_ +=    '      <div class=\"form-text text-muted\">Tulis dalam huruf kecil semua</div>';
    modal_body_ +=    '      <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '   </div>';
    modal_body_ +=    '</div>';

    modal_body_ +=    '<div class=\"row\">';
    modal_body_ +=    '   <div class=\"form-group col-lg-12 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '      <label for=\"inputUserGroupsSelect\">Grup Pengguna</label>';
    modal_body_ +=    '      <select class=\"form-control select2 custom-select\" id=\"inputUserGroupsSelect\" name=\"inputUserGroupsSelect\" required=\"required\" data-width=\"100%\">';
    modal_body_ +=    '           <option></option>';
    modal_body_ +=    '      </select>';
    modal_body_ +=    '      <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '   </div>';
    modal_body_ +=    '</div>';

    modal_body_ +=    '<div class=\"row\">';
    modal_body_ +=    '   <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '        <label for=\"inputUserPassword\">Kata Sandi <small><i>Pastikan kata sandi yang Anda tuliskan kuat!</i></small></label>';
    modal_body_ +=    '        <input type=\"password\" name=\"inputUserPassword\" id=\"inputUserPassword\" class=\"form-control pwstrength\" placeholder=\"Kata Sandi\" required=\"required\" autocomplete=\"new-password\" minlength=\"8\" data-indicator=\"pwindicator\">';
    modal_body_ +=    '        <small class=\"form-text text-muted\">Minimal 8 karakter, maksimal 30 karakter.</small>';
    modal_body_ +=    '        <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '        <div id=\"pwindicator\" class=\"pwindicator\">';
    modal_body_ +=    '            <div class=\"bar\"></div>';
    modal_body_ +=    '            <div class=\"label\"></div>';
    modal_body_ +=    '        </div>';
    modal_body_ +=    '    </div>';
    modal_body_ +=    '    <div class=\"form-group col-lg-6 col-xs-12 col-md-12 mb-3 input-form-data\">';
    modal_body_ +=    '         <label for=\"inputUserPasswordConfirm\">Konfirmasi Kata Sandi</label>';
    modal_body_ +=    '         <input type=\"password\" name=\"inputUserPasswordConfirm\" id=\"inputUserPasswordConfirm\" class=\"form-control\" placeholder=\"Konfirmasi Kata Sandi\" required=\"required\" autocomplete=\"new-password\" minlength=\"8\" data-match=\"#inputUserPassword\" data-match-error=\"Bidang Konfirmasi Kata Sandi tidak sama dengan bidang Kata Sandi.\">';
    modal_body_ +=    '         <small class=\"form-text text-muted\">Minimal 8 karakter, maksimal 30 karakter.</small>';
    modal_body_ +=    '         <div class=\"help-block with-errors\"></div>';
    modal_body_ +=    '    </div>';
    modal_body_ +=    '</div>';

    modal_body_ +=    '</form>';
    modal_body_ +=    '';
    ";

    echo $modal_body_;

    ?>

    /** Handle Validator */
    $(function() {
        /** create one instance for handler: */
        var myHandler = function(e) {
            $('#form-user-add').validator();
        };

        /** Bind it: */
        $('#form-user-add').on('keyup change', function(e) {
            myHandler(e);
        });
    });

    $('#modal-create-user').fireModal({
        title: 'Tambah Pengguna',
        footerClass: 'bg-whitesmoke',
        body: modal_body_,
        created: function(modal) {
            modal.find('.modal-footer').prepend(
                '<button type=\"button\" class=\"btn btn-secondary\" id=\"cancelBtn\" data-dismiss=\"modal\" onclick=\"reload_page()\">Batal</button>'
            );
            modal.find('.modal-md').toggleClass('modal-lg');
        },
        autoFocus: false,
        center: true,
        onFormSubmit: function(modal, e, form) {

            $('#form-user-add').addClass('was-validated');
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
                    url: '<?php echo base_url('manage/user/add')?>',
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
                                /** modal.find('#form-user-add')[0].reset(); Reset all form input */
                                $("input[name$='inputUserName").val('');
                                $("input[name$='inputUserFullName").val('');
                                $("input[name$='inputUserPhone").val('');
                                $("input[name$='inputUserEmail").val('');
                                $('#inputUserGroupsSelect').val(null).trigger('change'); /** Reset SELECT2 */
                                $("input[name$='inputUserPassword").val('');
                                $("input[name$='inputUserPasswordConfirm").val('');

                                /** REMOVE RED COLOR */
                                $('div.input-form-data').removeClass('has-danger has-error');
                                $('#form-user-add').removeClass('was-validated');
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
        $(".pwstrength").pwstrength();
    });
</script>
