<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <!-- <div class="login-brand">
        <img src="assets/img/stisla-fill.svg" alt="logo" width="100"
        class="shadow-light rounded-circle">
    </div> -->
    <div class="mt-5 card card-primary">
        <div class="card-header">
            <h4>
                <a href="<?php echo site_url(); ?>">
                    <b><?php echo lang('login_heading'); ?></b>
                    <?php echo lang('login_ending') ?></a>
            </h4>
        </div>

        <div class="card-body">

            <?php $attribute = array('autocomplete' => "off", 'id' => 'needs-validation', 'class' => 'vaForm', 'novalidate' => 'novalidate');
            echo form_open($this->uri->uri_string(), $attribute); ?>

            <?php $this->load->view('template_backend/component/element/element-message'); ?>

            <div class="form-group">
                <label for="email">Nama Pengguna</label>
                <?php echo form_input($identity); ?>
                <div class="invalid-feedback">
                    Please fill in your username
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">
                        Kata Sandi
                    </label>
                    <div class="float-right">
                        <a href="<?php echo site_url('forgot-password'); ?>" class="text-small">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                <?php echo form_input($password); ?>
                <div class="invalid-feedback">
                    please fill in your password
                </div>
            </div>

            <?php if ($this->config->item('remember_users', 'ion_auth') == true) { ?>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" value="1" id="remember">
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>

                    <!--<?php echo lang('login_remember_label', 'remember'); ?> <?php echo
                                                                                    form_checkbox('remember', '1', false, 'id="remember"'); ?>-->
                </div>
            <?php } ?>

            <div class="form-group text-right">
                <!-- <a href="auth-forgot-password.html" class="float-left mt-3"> Forgot
                Password? </a> -->
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon icon-right btn-submit-load" tabindex="4">
                    <?php echo lang('login_submit_btn'); ?>
                </button>
            </div>

            <!-- <div class="mt-5 text-center">
                Belum punya akun?
                <a href="<?php echo site_url('register'); ?>">Silakan buat akun</a>
            </div> -->
            <?php echo form_close(); ?>

        </div>
    </div>

    <!-- <div class="mt-5 text-muted text-center"> Don't have an account? <a
    href="<?php echo site_url('register'); ?>">Create One</a> </div> -->
    <div class="simple-footer">
        Copyright
        <i class="far fa-copyright" aria-hidden="true"></i>
        <?php echo $this->config->item('site_title', 'ion_auth'); ?>
        <sup>
            <small><?php echo $this->config->item('site_title_version', 'ion_auth'); ?> <!-- - (<?= CI_VERSION; ?>)--> </small>
        </sup>. Made with ❤️
    </div>
</div>