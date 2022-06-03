<nav class="navbar navbar-expand-lg main-navbar">
  <a href="<?php echo site_url(); ?>" class="navbar-brand sidebar-gone-hide">
    <?php echo $this->config->item('site_title', 'ion_auth'); ?><sup><small><?php echo $this->config->item('site_title_version', 'ion_auth'); ?></small></sup>
  </a>
  <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar">
    <span style="font-size: 0em; color: White;">
      <i class="fas fa-bars"></i>
    </span>
  </a>

  <?php $this->load->view('template_backend/component/element/navbar/navbar-collapse'); ?>

  <?php $this->load->view('template_backend/component/element/navbar/navbar-search'); ?>

  <?php $this->load->view('template_backend/component/element/navbar/navbar-right/right-main'); ?>

</nav>