<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>

		<?php $this->load->view('su_general/component/element/navbar/navbar-main'); ?>
		<?php $this->load->view('su_general/component/element/element-sidebar'); ?>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">

				<?php $this->load->view('su_general/component/element/element-breadcrumb'); ?>

				<?php
				if ($url1 == "manage" && $url2 == "list" && $url3 == "users") {
				    $this->load->view('su_manage/component/pages/pages-table/page-table-users');
				} elseif ($url1 == "manage" && $url2 == "add" && $url3 == "users") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-user-add');
				} elseif ($url1 == "manage" && $url2 == "edit" && $url3 == "users") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-user-edit');


				} elseif ($url1 == "manage" && $url2 == "list" && $url3 == "groups") {
				    $this->load->view('su_manage/component/pages/pages-table/page-table-groups');
				} elseif ($url1 == "manage" && $url2 == "add" && $url3 == "groups") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-group-add');
				} elseif ($url1 == "manage" && $url2 == "edit" && $url3 == "groups") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-group-edit');
				} elseif ($url1 == "manage" && $url2 == "permissions" && $url3 == "groups") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-group-permissions');


				} elseif ($url1 == "manage" && $url2 == "list" && $url3 == "permissions") {
				    $this->load->view('su_manage/component/pages/pages-table/page-table-permissions');
				} elseif ($url1 == "manage" && $url2 == "add" && $url3 == "permissions") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-permissions-add');
				} elseif ($url1 == "manage" && $url2 == "edit" && $url3 == "permissions") {
				    $this->load->view('su_manage/component/pages/pages-manage/page-manage-permissions-edit');
				}
				?>

			</section>
		</div>

		<?php //$this->load->view('su_general/footer/footer-main'); ?>

	</div>
</div>
