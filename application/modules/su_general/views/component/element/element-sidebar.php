<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo site_url(); ?>"><?php echo $this->config->item('site_title', 'ion_auth'); ?></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <!-- <a href="<?php echo site_url(); ?>"><?php echo $this->config->item('site_title_main', 'ion_auth'); ?></a> -->
            <img src="<?php echo  base_url('assets/img/logo_qrcomo.png'); ?>" alt="<?php echo $this->config->item('site_title', 'ion_auth'); ?>" width="35px" height="35px">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li <?php echo active_(1, 1, $url1, "dashboard"); ?>>
                <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>

            <?php if ($this->ion_auth_acl->has_permission('menu_manage')) { ?>
            <!-- menu manage -->
            <li class="menu-header">Manage</li>
            <li class="nav-item dropdown <?php echo active_(3, 2, $url3, "users", $url3, "groups", $url3, "permissions"); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage</span></a>
                <ul class="dropdown-menu">
                    <?php if ($this->ion_auth_acl->has_permission('menu_manage_users_staff') or $this->ion_auth_acl->has_permission('menu_manage_users_staff_view')) { ?>
                    <li <?php echo active_(1, 1, $url3, "users"); ?>>
                        <a class="nav-link" href="<?php echo site_url('manage/list/users'); ?>">Users</a>
                    </li>
                    <?php } ?>
                    <?php if ($this->ion_auth_acl->has_permission('menu_manage_group') or $this->ion_auth_acl->has_permission('menu_manage_group_view')) { ?>
                    <li <?php echo active_(1, 1, $url3, "groups"); ?>>
                        <a class="nav-link" href="<?php echo site_url('manage/list/groups'); ?>">Group's</a>
                    </li>
                    <?php } ?>
                    <?php if ($this->ion_auth_acl->has_permission('menu_manage_permission') or $this->ion_auth_acl->has_permission('menu_manage_permission_view')) { ?>
                    <li <?php echo active_(1, 1, $url3, "permissions"); ?>>
                        <a class="nav-link" href="<?php echo site_url('manage/list/permissions'); ?>">Permission's</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>


        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Panduan
            </a>
        </div>
    </aside>
</div>
