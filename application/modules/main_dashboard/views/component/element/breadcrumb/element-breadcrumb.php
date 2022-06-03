<div class="section-header">

  <?php $this->load->view('main_dashboard/component/element/breadcrumb/breadcrumb-title-main'); ?>

  <div class="section-header-breadcrumb">

    <div class="breadcrumb-item active">
      Dasbor
    </div>

    <div class="breadcrumb-item">

      <a href="<?php echo site_url($url1 . "/" . $url2 . "/list"); ?>">
        Dashboard 02
      </a>

    </div>

    <?php $this->load->view('main_dashboard/component/element/breadcrumb/breadcrumb-title-item'); ?>

  </div>

</div>