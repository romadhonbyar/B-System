<?php

$inputGroupName = [
    'name' => 'inputGroupName',
    'id' => 'inputGroupName',
    'type' => 'text',
    'class' => 'form-control',
    'value' => $this->form_validation->set_value('inputGroupName'),
    'placeholder' => "Nama Grup",
    'required' => 'required',

    'pattern' => '^[a-zA-Z0-9-_]+$'
];

$inputGroupDescription = [
    'name' => 'inputGroupDescription',
    'id' => 'inputGroupDescription',
    'class' => 'form-control h-50',
    'value' => $this->form_validation->set_value('inputGroupDescription'),
    'placeholder' => 'Deskripsi Grup',
    'required' => 'required',

    'maxlength' => '255',
    'minlength' => '5',
    'rows' => "3",
];

?>

<?php
$attribute = [
    'id' => '',
    'class' => 'needs-validation',
    'novalidate' => '',
    'data-toggle' => 'validator',
];
echo form_open(site_url('manage/group/add'), $attribute);
?>

<div class="modal" tabindex="-1" role="dialog" id="create-group">
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
                        <label for="inputGroupName">Nama Grup</label>
                        <?php echo form_input($inputGroupName); ?>
                        <small id="inputGroupNameHelp" class="form-text text-muted">Hanya boleh memasukkan alphabet dan tanda pisah ( <b>-</b> atau <b>_</b> ).</small>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row h-50">
                    <div class="form-group col-lg-12 col-xs-12 col-md-12 mb-0">
                        <label for="inputGroupDescription">Deskripsi Grup</label>
                        <?php echo form_textarea($inputGroupDescription); ?>
                        <small id="inputGroupDescriptionHelp" class="form-text text-muted">Minimal 5 karakter, maksimal 255 karakter.</small>
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