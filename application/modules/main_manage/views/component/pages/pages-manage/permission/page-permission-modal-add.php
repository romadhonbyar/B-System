<?php

$inputPermKey = [
    'name' => 'inputPermKey',
    'id' => 'inputPermKey',
    'type' => 'text',
    'class' => 'form-control',
    'value' => set_value('inputPermKey', $this->input->post('inputPermKey')),
    'placeholder' => "Kunci Hak Akses",
    'required' => 'required',

    'pattern' => '^[a-zA-Z0-9-_]+$'
];

$inputPermName = [
    'name' => 'inputPermName',
    'id' => 'inputPermName',
    'class' => 'form-control',
    'value' => $this->form_validation->set_value('inputPermName'),
    'placeholder' => "Nama Hak Akses",
    'required' => 'required',

    'maxlength' => '255',
    'minlength' => '5',

    'pattern' => '^[a-zA-Z ]*$'
];

?>

<?php
$attribute = [
    'id' => '',
    'class' => 'needs-validation',
    'novalidate' => '',
    'data-toggle' => 'validator',
];
echo form_open(site_url('manage/permission/add'), $attribute);
?>

<div class="modal" tabindex="-1" role="dialog" id="create-permission">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Grup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-lg-12 col-xs-12 col-md-12 mb-3">
                        <label for="inputPermKey">Kunci Hak Akses</label>
                        <?php echo form_input($inputPermKey); ?>
                        <small id="inputPermKeyHelp" class="form-text text-muted">Hanya boleh memasukkan alphabet dan tanda pisah ( <b>-</b> atau <b>_</b> ).</small>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12 col-xs-12 col-md-12 mb-3">
                        <label for="inputPermKey">Nama Hak Akses</label>
                        <?php echo form_input($inputPermName); ?>
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