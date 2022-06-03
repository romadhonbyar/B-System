<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <!-- <div class="login-brand"> <img src="assets/img/stisla-fill.svg" alt="logo"
    width="100" class="shadow-light rounded-circle"> </div> -->

    <div class="mt-5 card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <?php $attribute = array(
                'autocomplete' => "off", 'id' => 'needs-validation', 'class' => 'vaForm', 'novalidate' => 'novalidate',
                'oninput' => "password_confirm.setCustomValidity(password_confirm.value != password.value ? 'Passwords do not match.' : '')"
            );
            echo form_open($this->uri->uri_string(), $attribute); ?>

            <?php $this->load->view('template_backend/component/element/element-message'); ?>

            <?php if ($full_name_column == "yes") { ?>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <?php echo form_input($full_name); ?>
                    <div class="invalid-feedback">
                        Please fill in your full name
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="full_name">First Name</label>
                        <?php echo form_input($first_name); ?>
                        <div class="invalid-feedback">
                            Please fill in your first name
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="full_name">Last Name</label>
                        <?php echo form_input($last_name); ?>
                        <div class="invalid-feedback">
                            Please fill in your last name
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($identity_column == "email") { ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <?php echo form_input($email); ?>
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="identity">Username</label>
                        <?php echo form_input($identity); ?>
                        <div class="invalid-feedback">
                            Please fill in your username
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <?php echo form_input($email); ?>
                        <div class="invalid-feedback">
                            Please fill in your email
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <?php echo form_input($password); ?>
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                    <div class="invalid-feedback">
                        Please fill in your password
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <?php echo form_input($password_confirm); ?>
                    <div class="invalid-feedback">
                        Check your passwords!
                    </div>
                </div>
            </div>

            <!-- <div class="form-group"> <div class="custom-control custom-checkbox">
            <input type="checkbox" name="agree" class="custom-control-input" id="agree"
            required> <label class="custom-control-label" for="agree">I agree with the terms
            and conditions</label> </div> </div> -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon icon-right btn-submit-load" tabindex="4">
                    Register
                </button>
            </div>

            <div class="mt-5 text-center">
                Sudah punya akun?
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