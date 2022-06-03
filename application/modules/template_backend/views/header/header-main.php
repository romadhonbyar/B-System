    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css?v=' . strtotime("now") . ''); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('vendor/components/font-awesome/css/all.min.css?v=' . strtotime("now") . ''); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('vendor/datatables/datatables/media/css/dataTables.bootstrap4.css?v=' . strtotime("now") . ''); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/base/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css?v=' . strtotime("now") . ''); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/base/plugins/datatables.net-checkboxes/dataTables.checkboxes.css?v=' . strtotime("now") . ''); ?>">

    <link rel="stylesheet" href="<?php echo base_url('vendor/select2/select2/dist/css/select2.min.css?v=' . strtotime("now") . ''); ?>">    
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/base//plugins/daterangepicker/daterangepicker.css?v=' . strtotime("now") . ''); ?>">

    <!-- Library Offline -->
    <link rel="stylesheet"
        href="<?php echo base_url('assets/backend/base/plugins/offline/offline-0.7.14/themes/offline-language-english.css?v=' . strtotime("now") . ''); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('assets/backend/base/plugins/offline/offline-0.7.14/themes/offline-theme-slide.css?v=' . strtotime("now") . ''); ?>">
    
    <!-- PWA -->
	<!-- <link rel="manifest" href="<?php echo base_url('assets/manifest.json'); ?>" /> -->

    <?php $this->load->view('template_backend/header/header-css-template'); ?>
