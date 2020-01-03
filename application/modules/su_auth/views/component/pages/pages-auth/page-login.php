<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/backend/base/img/stisla-fill.svg'); ?>" alt="logo" width="100"
                class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4><a href="<?php echo site_url(); ?>"><b><?php echo lang('login_heading'); ?></b>
                    <?php echo lang('login_ending') ?></a></h4>
              </div>

              <div class="card-body">

                <?php $attribute = array('autocomplete' => "off", 'id' => 'needs-validation', 'class' => 'reg_form', 'novalidate' => 'novalidate');
echo form_open($this->uri->uri_string(), $attribute); ?>

                <?php $this->load->view('su_general/component/element/element-message'); ?>

                <div class="form-group">
                  <label for="email">
                    <?php echo lang('login_identity_label'); ?></label>
                  <?php echo form_input($identity); ?>
                  <div class="invalid-feedback">
                    Please fill in your username
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">
                      <?php echo lang('login_password_label'); ?></label>
                    <div class="float-right">
                      <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <?php echo form_input($password); ?>
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>

                <!--
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" value="1"
                      id="remember">
                    <label class="custom-control-label" for="remember">Remember Me</label>
                  </div>
                </div>-->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"
                    tabindex="4"><?php echo lang('login_submit_btn'); ?></button>
                </div>

                <?php echo form_close(); ?>

                <!-- <div class="mt-5 text-muted text-center">
                  Don't have an account? <a href="auth-register.html">Create One</a> 
                </div> -->

              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; Wika Gedung <?php echo date('Y');?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
