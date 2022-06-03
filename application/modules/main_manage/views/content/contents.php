<?php $this->load->view('main_manage/header/header-main'); ?>

<?php echo $contents; ?>

<?php if ($url1 == "manage") { ?>
    <?php if ($url2 == "user") { ?>
        <?php $this->load->view('main_manage/footer/user/footer'); ?>
    <?php } else if ($url2 == "group") { ?>
        <?php if($url3 == "list") { ?>
            <?php $this->load->view('main_manage/footer/group/footer'); ?>
        <?php } else if ($url3 == "permission") { ?>
            <?php $this->load->view('main_manage/footer/group-permission/footer'); ?>
        <?php } ?>
    <?php } else if ($url2 == "permission") { ?>
        <?php $this->load->view('main_manage/footer/permission/footer'); ?>
    <?php } ?>
<?php } ?>