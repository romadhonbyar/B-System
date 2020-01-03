<li class="dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <!-- <img alt="image" src="<?php echo base_url('assets/backend/base/img/avatar/avatar-1.png'); ?>" class="rounded-circle mr-1"> -->
        <?php echo my_gravatar($user_data->email, 80, "g", false, false); ?>
        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo ucfirst($user_data->username); ?></div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in 5 min ago</div>
        <a href="<?php echo site_url('manage/edit/users/'.encodeID($user_data->id)); ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
        </a>
        <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo site_url('logout'); ?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</li>
