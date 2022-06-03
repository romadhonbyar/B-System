<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <!-- <img alt="image" src="<?php echo  base_url('assets/backend/base/img/avatar/avatar-1.png'); ?>" class="rounded-circle mr-1"> -->
    <?php echo my_gravatar($user_data->email, 80, "g", false, false, "gravatar rounded-circle mr-1", "profile"); ?>
    <div class="d-sm-none d-lg-inline-block">
      Hi, <?php echo ucfirst($user_data->full_name); ?>
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-right">
    <div class="dropdown-title">Masuk <span id="last-login"></span></div>
    <a href="<?php echo site_url('manage/user/edit/' . encrypt_code($user_data->id)); ?>" class="dropdown-item has-icon">
      <i class="far fa-user"></i> Profil
    </a>
    <!--<a href="features-activities.html" class="dropdown-item has-icon">
      <i class="fas fa-bolt"></i> Activities
    </a>
    <a href="features-settings.html" class="dropdown-item has-icon">
      <i class="fas fa-cog"></i> Settings
    </a>-->
    <div class="dropdown-divider"></div>
    <a href="<?php echo site_url('logout'); ?>" class="dropdown-item has-icon text-danger">
      <i class="fas fa-sign-out-alt"></i> Keluar
    </a>
  </div>
</li>