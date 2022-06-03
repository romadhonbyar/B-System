<div id="app">
    <!-- start app -->
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>

        <?php $this->load->view('template_backend/component/element/navbar/navbar-main'); ?>

        <?php $this->load->view('template_backend/component/element/navbar/navbar-lg/navbar-lg-main'); ?>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <?php $this->load->view('main_dashboard/component/element/breadcrumb/element-breadcrumb'); ?>

                <div class="section-body">
                    <!-- <h2 class="section-title">This is Example Page</h2> -->
                    <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
                    <div class="card">
                        <div class="card-header">
                            DASHBOARD
                        </div>

                        <div class="card-body">
                            CI Versi <?php echo CI_VERSION; ?>
                        </div>

                        <div class="card-footer text-right bg-whitesmoke">
                            This is card footer
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
<!-- end app -->

<!-- Modal Add -->