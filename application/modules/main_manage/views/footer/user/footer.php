    <!-- === Page GENERAL JS File === -->
    <?php $this->load->view('template_backend/footer/footer-js-general'); ?>

    <!-- === Page Specific First JS File === -->
    <?php $this->load->view('main_manage/footer/user/footer-main/main-datatables'); ?>
    <?php $this->load->view('main_manage/footer/user/footer-main/main-sweetalert'); ?>

    <!-- === JS Libraries === -->
    <!-- Library via Vendor & Plugin -->
    <?php $this->load->view('template_backend/footer/footer-js-select2'); ?>
    <?php $this->load->view('template_backend/footer/footer-js-datatables'); ?>
    <?php $this->load->view('template_backend/footer/footer-js-library-other'); ?>

    <!-- === JS Template === -->
    <?php $this->load->view('template_backend/footer/footer-js-template'); ?>

    <!-- === Page Specific JS File GLOBAL === -->
    <?php $this->load->view('template_backend/footer/footer-js-momenjs'); ?>
    <?php $this->load->view('template_backend/footer/footer-js-btn-submit-load'); ?>

    <!-- === MODAL CRUD === -->
    <?php $this->load->view('main_manage/footer/user/footer-main/main-crud-user-add'); ?>
    <?php /* $this->load->view('main_manage/footer/user/footer-main/main-crud-user-edit');*/ ?>

    <!-- === Page Specific JS File SPECIAL === -->
    <?php $this->load->view('main_manage/footer/user/footer-special/special-extra'); ?>

    <!-- === Page Specific LAST JS File === -->
    <?php $this->load->view('main_manage/footer/user/footer-main/main-select2'); ?>

    <!-- === Handle ERROR === -->
    <?php $this->load->view('template_backend/footer/footer-js-handle-error'); ?>


    </body>

    </html>