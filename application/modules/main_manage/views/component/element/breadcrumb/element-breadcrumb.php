<div class="section-header">

  <?php $this->load->view('main_manage/component/element/breadcrumb/breadcrumb-title-main'); ?>

  <div class="section-header-breadcrumb">

    <?php if ($url1 != "dashboard") { ?>
      <div class="breadcrumb-item">
        <a href="<?php echo site_url('dashboard'); ?>">Dasbor</a>
      </div>
    <?php } else { ?>
      <div class="breadcrumb-item active">
        Dasbor
      </div>
    <?php } ?>

    <?php if ($this->ion_auth->is_admin()) { ?>
      <?php if ($url3 == "add" or $url3 == "edit") { ?>
        <div class="breadcrumb-item">

          <a href="<?php echo site_url($url1 . "/" . $url2 . "/list"); ?>">
            <?php if ($url1 == "manage") { ?>
              <?php if ($url2 == "user") { ?>
                Tabel pengguna
              <?php } elseif ($url2 == "group") { ?>
                Tabel grup
              <?php } elseif ($url2 == "permission") { ?>
                Tabel hak akses
              <?php } ?>
            <?php } ?>
          </a>

        </div>
      <?php }  ?>
    <?php } ?>

    <?php $this->load->view('main_manage/component/element/breadcrumb/breadcrumb-title-item'); ?>

  </div>

</div>