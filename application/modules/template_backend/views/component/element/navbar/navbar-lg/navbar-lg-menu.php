<ul class="navbar-nav">
  <li
    class="nav-item <?php echo active_(1, 2, "or", $url1, "dashboard"); ?>">
    <a href="<?php echo site_url('dashboard'); ?>"
      class="nav-link">
      <i class="fa-regular fa-square"></i> <span>Dasbor</span>
    </a>
  </li>


  <?php if ($this->ion_auth_acl->has_permission("manage")) { ?>
  <li
    class="nav-item <?php echo active_(3, 2, "or", $url2, "user", $url2, "group", $url2, "permission"); ?> dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
        class="fas fa-fire"></i><span>Mengelola</span></a>
    <ul class="dropdown-menu">
      <?php if ($this->ion_auth_acl->has_permission('manage_user') && $this->ion_auth_acl->has_permission('manage_user_view_menu')) { ?>
      <li
        class="nav-item <?php echo active_(1, 2, "or", $url2, "user"); ?>">
        <a href="<?php echo site_url('manage/user/list'); ?>"
          class="nav-link">
          <i class="fas fa-user fa-fw"></i> Pengguna
        </a>
      </li>
      <?php } ?>
      <?php if ($this->ion_auth_acl->has_permission('manage_group') && $this->ion_auth_acl->has_permission('manage_group_view_menu')) { ?>
      <li
        class="nav-item <?php echo active_(1, 2, "or", $url2, "group"); ?>">
        <a href="<?php echo site_url('manage/group/list'); ?>"
          class="nav-link">
          <i class="fas fa-users fa-fw"></i> Grup
        </a>
      </li>
      <?php } ?>
      <?php if ($this->ion_auth_acl->has_permission('manage_permission') && $this->ion_auth_acl->has_permission('manage_permission_view_menu')) { ?>
      <li
        class="nav-item <?php echo active_(1, 2, "or", $url2, "permission"); ?>">
        <a href="<?php echo site_url('manage/permission/list'); ?>"
          class="nav-link">
          <i class="fas fa-universal-access fa-fw"></i> Hak Akses
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>

  <?php if ($this->ion_auth_acl->has_permission("kpm")) { ?>
    <li
      class="nav-item <?php echo active_(1, 2, $url2, "member", $url2); ?> dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
          class="fas fa-users"></i><span>Anggota</span></a>
      <ul class="dropdown-menu">
        <?php if ($this->ion_auth_acl->has_permission('kpm_manage_member') && $this->ion_auth_acl->has_permission('kpm_manage_member_view_menu')) { ?>
        <li
          class="nav-item <?php echo active_(2, 2, "and", $url2, "member", $url3, "list"); ?>">
          <a href="<?php echo site_url('manage/member/list/all'); ?>"
            class="nav-link">
            <i class="fas fa-list fa-fw"></i> Data Anggota
          </a>
        </li>
        <?php } ?>
        <?php if ($this->ion_auth_acl->has_permission('kpm_manage_member') && $this->ion_auth_acl->has_permission('kpm_manage_member_view_menu')) { ?>
          <!-- <li class="nav-item <?php echo active_(2, 2, "and", $url2, "member", $url3, "import"); ?>">
            <a href="<?php echo site_url('manage/member/import'); ?>"
              class="nav-link">
              <i class="fas fa-list fa-fw"></i> Impor Data Anggota
            </a>
        </li> -->
        <?php } ?>
      </ul>
    </li>
  <?php } ?>

  <?php if ($this->ion_auth_acl->has_permission("kpm")) { ?>
  <li
    class="nav-item <?php echo active_(1, 2, $url2, "transaction", $url2); ?> dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
        class="fas fa-exchange-alt"></i><span>Transaksi</span></a>
    <ul class="dropdown-menu">
      <?php if ($this->ion_auth_acl->has_permission('kpm_manage_transaction') && $this->ion_auth_acl->has_permission('kpm_manage_transaction_view_menu')) { ?>

      <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "all"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/all")?>"
          class="nav-link">
          <i class="fas fa-th fa-fw"></i> Semua
        </a>
      </li>
      <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "new"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/new")?>"
          class="nav-link">
          <i class="fas fa-plus-square fa-fw"></i> Baru
        </a>
      </li>
      <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "deposit"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/deposit")?>"
          class="nav-link">
          <i class="fas fa-arrow-alt-circle-down fa-fw"></i> Setoran
        </a>
      </li>
      <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "withdrawal"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/withdrawal")?>"
          class="nav-link">
          <i class="fas fa-arrow-alt-circle-up fa-fw"></i> Penarikan
        </a>
      </li>
      <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "autodebet"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/autodebet")?>"
          class="nav-link">
          <i class="fas fa-history fa-fw"></i> Autodebet
        </a>
      </li>
      <!-- <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "white"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/white")?>"
          class="nav-link">
          <i class="fas fa-user-clock fa-fw"></i> Auto diputihkan
        </a>
      </li> -->
      <li
        class="nav-item <?php echo active_(3, 4, "and", $url2, "transaction", $url3, "list", $url4, "out"); ?>">
        <a href="<?php echo site_url("manage/transaction/list/out")?>"
          class="nav-link">
          <i class="fas fa-user-slash fa-fw"></i> Keluar diputihkan
        </a>
      </li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>

  <?php if ($this->ion_auth_acl->has_permission("kpm")) { ?>
    <li
      class="nav-item <?php echo active_(1, 2, $url2, "report", $url2); ?> dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
        <i class="fas fa-file"></i><span>Laporan</span>
      </a>
      <ul class="dropdown-menu">
        <?php if ($this->ion_auth_acl->has_permission('kpm_report_member') && $this->ion_auth_acl->has_permission('kpm_report_member_view_menu')) { ?>
        <li
          class="nav-item <?php echo active_(2, 2, "and", $url2, "report", $url3, "simpanan"); ?>">
          <a href="<?php echo site_url('report/member/simpanan'); ?>"
            class="nav-link">
            <i class="fas fa-list fa-fw"></i> Simpanan Anggota
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
  <?php } ?>

</ul>