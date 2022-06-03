<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                
                    <!-- <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div> -->

                            <?php
                            if ($url2 == "login") {
                                $this->load->view('main_auth/component/pages/pages-auth/page-login');
                            } elseif ($url2 == "register") {
                                $this->load->view('main_auth/component/pages/pages-auth/page-register');
                            } elseif ($url2 == "forgot_password") {
                                $this->load->view('main_auth/component/pages/pages-auth/page-password-forgot');
                            } elseif ($url2 == "reset_password") {
                                $this->load->view('main_auth/component/pages/pages-auth/page-password-reset');
                            }

                            // application\modules\main_auth\views\component\pages\pages-auth\page-password-reset.php
                            ?>

                        <!-- <div class="simple-footer">
                            Copyright <i class="far fa-copyright" aria-hidden="true"></i> <?php echo $this->config->item('site_title', 'ion_auth'); ?><sup><small><?php echo $this->config->item('site_title_version', 'ion_auth'); ?></small></sup>. Made with ❤️
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
    </div>