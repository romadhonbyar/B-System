<div id="app"> <!-- start app -->
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>

        <?php $this->load->view(
            'template_backend/component/element/navbar/navbar-main'
        ); ?>

        <?php $this->load->view(
            'template_backend/component/element/navbar/navbar-lg/navbar-lg-main'
        ); ?>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <?php $this->load->view(
                    'main_manage/component/element/breadcrumb/element-breadcrumb'
                ); ?>

                <?php if (
                    $url1 == "manage"  && 
                    $url2 == "user"  && 
                    $url3 == "list"
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-table/table-main'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "user"  && 
                    $url3 == 'add'
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-manage/user/page-manage-user-add'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "user"  && 
                    $url3 == 'edit'
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-manage/user/page-manage-user-edit'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "group"  && 
                    $url3 == "list"
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-table/table-main'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "group"  && 
                    $url3 == 'add'
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-manage/group/page-manage-group-add'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "group"  && 
                    $url3 == 'edit'
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-manage/group/page-manage-group-edit'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "group"  && 
                    $url3 == "permission"
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-table/table-main'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "permission"  && 
                    $url3 == "list"
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-table/table-main'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "permission"  && 
                    $url3 == 'add'
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-manage/permission/page-manage-permission-add'
                    );
                } elseif (
                    $url1 == "manage"  && 
                    $url2 == "permission"  && 
                    $url3 == 'edit'
                ) {
                    $this->load->view(
                        'main_manage/component/pages/pages-manage/permission/page-manage-permission-edit'
                    );
                } ?>
            </section>
        </div>
    </div>
</div>
<!-- end app -->

<!-- Modal Add -->
<!-- <?php if ($url1 == "manage" && $url2 == "user" && $url3 == "list") { ?>
    <?php /* $this->load->view('main_manage/component/pages/pages-manage/user/page-user-modal-add');*/ ?>
<?php } else if($url1 == "manage" && $url2 == "group" && $url3 == "list") { ?>
    <?php /* $this->load->view('main_manage/component/pages/pages-manage/group/page-group-modal-add');*/ ?>
<?php } else if($url1 == "manage" && $url2 == "permission" && $url3 == "list") { ?>
    <?php $this->load->view('main_manage/component/pages/pages-manage/permission/page-permission-modal-add'); ?>
<?php } ?> -->
