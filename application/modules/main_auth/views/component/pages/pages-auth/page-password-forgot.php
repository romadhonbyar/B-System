<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <!-- <div class="login-brand"> <img src="assets/img/stisla-fill.svg" alt="logo"
    width="100" class="shadow-light rounded-circle"> </div> -->
    <div class="mt-5 card card-primary">
        <div class="card-header">
            <h4>Reset Password</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">We will send a link to reset your password</p>

            <?php $attribute = array('autocomplete' => "off", 'id' => 'needs-validation', 'class' => 'vaForm', 'novalidate' => 'novalidate');
            echo form_open($this->uri->uri_string(), $attribute); ?>

            <?php $this->load->view('template_backend/component/element/element-message'); ?>

            <div class="form-group">
                <label for="username">Nama Pengguna</label>
                <?php echo form_input($identity); ?>
                <div class="invalid-feedback">
                    Please fill in your username
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Forgot Password
                </button>
            </div>

            <div class="mt-5 text-center">
                Sudah ingat password-nya?
                <a href="<?php echo site_url('login'); ?>">Silakan login</a>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
    <div class="simple-footer">
        Copyright
        <i class="far fa-copyright" aria-hidden="true"></i>
        <?php echo $this->config->item('site_title', 'ion_auth'); ?>
        <sup>
            <small><?php echo $this->config->item('site_title_version', 'ion_auth'); ?></small>
        </sup>. Made with ❤️
    </div>
</div>