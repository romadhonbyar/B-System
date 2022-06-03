<?php

$user_name = [
    'name' => 'inputUsername',
    'id' => 'inputUsername',
    'type' => 'text',
    'class' => 'form-control',
    'value' => $this->form_validation->set_value('inputUsername'),
    'placeholder' => 'Nama Pengguna',
    'required' => 'required',

    'pattern' => '^[a-zA-Z0-9_.-]*$',
];

$full_name = [
    'name' => 'inputFullname',
    'id' => 'inputFullname',
    'type' => 'text',
    'class' => 'form-control',
    'value' => $this->form_validation->set_value('inputFullname'),
    'placeholder' => 'Nama Lengkap',
    'required' => 'required',

    'pattern' => '^[a-zA-Z ]*$',
];

$phone = [
    'name' => 'inputPhone',
    'id' => 'inputPhone',
    'type' => 'number',
    'class' => 'form-control',
    'value' => $this->form_validation->set_value('inputPhone'),
    'placeholder' => 'Nomor Handphone',
    'required' => 'required',

    'pattern' => '^08[0-9]{9,}$',

    'min' => '1',
];

$email = [
    'name' => 'inputEmail',
    'id' => 'inputEmail',
    'type' => 'email',
    'class' => 'form-control',
    'value' => $this->form_validation->set_value('inputEmail'),
    'placeholder' => 'Surat Elektronik (E-mail)',
    'required' => 'required',

    'pattern' => '^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$',
];

if (
    $this->ion_auth->is_admin() or
    $this->ion_auth_acl->has_permission('manage_user_add')
) {
    $password = [
        'name' => 'inputPassword',
        'id' => 'inputPassword',
        'type' => 'password',
        'class' => 'form-control pwstrength',
        'placeholder' => 'Kata Sandi',
        'required' => 'required',

        'autocomplete' => 'new-password',
        'pattern' => '^\S{8,}$',

        'minlength' => '8',
        'data-indicator' => 'pwindicator',
    ];

    $password_confirm = [
        'name' => 'inputPasswordConfirm',
        'id' => 'inputPasswordConfirm',
        'type' => 'password',
        'class' => 'form-control',
        'placeholder' => 'Konfirmasi Kata Sandi',
        'required' => 'required',

        'autocomplete' => 'new-password',
        'pattern' => '^\S{8,}$',

        'minlength' => '8',
        'data-match' => '#inputPassword',
        'data-match-error' =>
            'Bidang Konfirmasi Kata Sandi tidak sama dengan bidang Kata Sandi.',
    ];
}
?>

<?php
$attribute = [
    'id' => '',
    'class' => 'needs-validation',
    'novalidate' => '',
    'data-toggle' => 'validator',
];
echo form_open(site_url('manage/user/add'), $attribute);
?>

<div class="modal" tabindex="-1" role="dialog" id="create-user">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-lg-6 col-xs-12 col-md-12 mb-3">
                        <label for="inputUsername">Nama Pengguna</label>
                        <?php echo form_input($user_name); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-6 col-xs-12 col-md-12 mb-3">
                        <label for="inputFullname">Nama Lengkap</label>
                        <?php echo form_input($full_name); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-xs-12 col-md-12 mb-3">
                        <label for="inputPhone">Nomor Handphone</label>
                        <?php echo form_input($phone); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-6 col-xs-12 col-md-12 mb-3">
                        <label for="inputEmail">Surat Elektronik (E-mail)</label>
                        <?php echo form_input($email); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12 col-xs-12 col-md-12 mb-3">
                        <label for="inputGroupsSelect">Grup Pengguna</label>
                        <select
                            class="form-control select2 custom-select"
                            id="groups_select"
                            name="inputGroupsSelect"
                            required="required"
                            data-width="100%">
                            <option></option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-xs-12 col-md-12 mb-3">
                        <label for="inputPassword">Kata Sandi</label>
                        <?php echo form_input($password); ?>
                        <small id="inputGroupDescriptionHelp" class="form-text text-muted">Minimal 8 karakter, maksimal 30 karakter.</small>
                        <div class="help-block with-errors"></div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-xs-12 col-md-12 mb-0">
                        <label for="inputPasswordConfirm">Konfirmasi Kata Sandi</label>
                        <?php echo form_input($password_confirm); ?>
                        <small id="inputGroupDescriptionHelp" class="form-text text-muted">Minimal 8 karakter, maksimal 30 karakter.</small>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button id="submitBtn" type="submit" class="btn btn-success btn-submit-load">Simpan</button>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>