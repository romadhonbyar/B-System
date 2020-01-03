<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <?php $this->load->view('su_general/component/element/navbar/navbar-toggle'); ?>
        <?php //$this->load->view('su_general/component/element/navbar/navbar-search'); ?>
    </form>
    <ul class="navbar-nav navbar-right">
        <?php //$this->load->view('su_general/component/element/navbar/navbar-messages'); ?>
        <?php //$this->load->view('su_general/component/element/navbar/navbar-notifications'); ?>
        <?php $this->load->view('su_general/component/element/navbar/navbar-profiles'); ?>
    </ul>
</nav>
