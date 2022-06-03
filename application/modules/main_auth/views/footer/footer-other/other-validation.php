<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js'></script>-->
<script src='<?php echo base_url('assets/backend/base/plugins/validator/validator.min.js'); ?>'></script>
<script type="text/javascript">
    /*$('#vaForm').validator();*/
    $('#reg_form_reg').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            /* handle the invalid form...*/
            console.log('No');
        } else {
            /*everything looks good!*/
            console.log('Yes');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('register/ajax'); ?>",
                dataType: "json",
                data: $("#reg_form_reg").serialize(),
                success: function(data) {
                    if ($.trim(data.identity) ||
                        $.trim(data.full_name) ||
                        $.trim(data.email) ||
                        $.trim(data.password) ||
                        $.trim(data.password_confirm)
                    ) {
                        if ($.trim(data.identity)) {
                            $("#e_identity_a").addClass("has-error has-danger");
                            $("#e_identity_b").html(data.identity);
                        } else if ($.trim(data.full_name)) {
                            $("#e_full_name_a").addClass("has-error has-danger");
                            $("#e_full_name_b").html(data.full_name);
                        } else if ($.trim(data.email)) {
                            $("#e_email_a").addClass("has-error has-danger");
                            $("#e_email_b").html(data.email);
                        } else if ($.trim(data.password)) {
                            $("#e_password_a").addClass("has-error has-danger");
                            $("#e_password_b").html(data.password);
                        } else if ($.trim(data.password_confirm)) {
                            $("#e_password_confirm_a").addClass("has-error has-danger");
                            $("#e_password_confirm_b").html(data.password_confirm);
                        }
                    } else {
                        alert(data.message);
                    }
                },
                error: function(result) {
                    alert("Error Parah!");
                }
            });
            return false;
        }
    });


    $('#reg_form_reg').validator().on('keypress', function(e) {
        $("#identity_a").removeClass("has-error has-danger");
        $("#identity_b").empty();
    });
</script>