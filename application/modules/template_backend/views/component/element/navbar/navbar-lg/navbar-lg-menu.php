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


</ul>