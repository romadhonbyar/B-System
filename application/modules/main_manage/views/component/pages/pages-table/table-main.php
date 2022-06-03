<div class="section-body">
    <!-- <h2 class="section-title">This is Example Page</h2> -->
    <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
    <div class="card">
        <div class="card-header">
            <?php $this->load->view('main_manage/component/element/section-body/sb-card-header-title'); ?>
            <div class="card-header-action">
                <?php if ($url2 == "group" && $url3 == "permission") { ?>
                    <a href="#" class="btn btn-primary" onclick="reload_page()">
                        <i class="fas fa-redo-alt fa-fw"></i> Muat ulang
                    </a>
                <?php } else { ?>
                    <div class="btn-group">
                        <?php $string = $url2; ?>
                        <?php if ($this->ion_auth_acl->has_permission('manage_' . $string . '_add')) { ?>
                        <button class="btn btn-warning"
                            id="modal-create-<?php echo $string; ?>">
                            <i class="fas fa-plus-circle fa-fw"></i>
                            Tambah <?php echo $string; ?>
                        </button>
                        <?php } ?>
                        <a href="#" class="btn btn-primary" onclick="reload_table()">
                            <i class="fas fa-redo-alt fa-fw"></i>
                            Muat ulang
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php if ($url2 == "group" && $url3 == "permission") { ?>
            <?php $attribute= array( 'autocomplete' => 'off','id'=>'reg_form','class' => '','' => ''); echo form_open($this->uri->uri_string(), $attribute);?>
        <?php } ?>
        <div class="card-body">

            <?php $this->load->view('template_backend/component/element/element-message'); ?>

            <div class="table-responsive">
                <!-- <form id="frm-example" action="#" method="POST"> -->
                    <table id="table" class="table table-md table-striped table-bordered table-hover nowrap"
                        style="width:100%">
                        <?php if ($url2 == "user") { ?>
                            <?php $this->load->view('main_manage/component/pages/pages-table/table-user'); ?>
                        <?php } elseif ($url2 == "group") { ?>
                        <?php if ($url3 == "list") { ?>
                            <?php $this->load->view('main_manage/component/pages/pages-table/table-group'); ?>
                        <?php } elseif ($url3 == "permission") { ?>
                            <?php $this->load->view('main_manage/component/pages/pages-table/table-group-permission'); ?>
                        <?php } ?>
                        <?php } elseif ($url2 == "permission") { ?>
                            <?php $this->load->view('main_manage/component/pages/pages-table/table-permission'); ?>
                        <?php } ?>
                    </table>

                    <!-- <hr>

                    <p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

                    <p><button>Submit</button></p>

                    <p><b>Selected rows data:</b></p>
                    <pre id="example-console-rows"></pre>

                    <p><b>Form data as submitted to the server:</b></p>
                    <pre id="example-console-form"></pre> -->

                <!-- </form> -->
            </div>

        </div>
        <div class="card-footer text-right bg-whitesmoke">
            <?php if ($url2 == "group" && $url3 == "permission") { ?>
                <button name="reset" type="reset" id="reset"
                    class="pull-right btn btn-danger btn-flat btn-save">Reset</button>
                <button name="save" type="submit" id="save" value="true"
                    class="pull-right btn btn-warning btn-flat btn-save btn-submit-load">Simpan</button>
            <?php } else { ?>
                This is card footer
            <?php } ?>
        </div>
        <?php if ($url2 == "group" && $url3 == "permission") { ?>
            <?php form_close(); ?>
        <?php } ?>
    </div>
</div>