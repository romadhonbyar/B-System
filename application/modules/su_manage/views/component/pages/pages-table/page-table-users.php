<div class="section-body">
    <!-- <h2 class="section-title">This is Example Page</h2> -->
    <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
    <div class="card">
        <div class="card-header">
    			  <?php $this->load->view('su_general/component/element/setion-body/sb-card-header-title'); ?>
            <div class="card-header-action">
                <div class="btn-group">
                    <a href="<?php echo site_url('manage/add/users'); ?>" class="btn btn-warning">Add</a>
                    <a href="#" class="btn btn-primary" onclick="reload_table()">Refresh</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <!-- <div class="table-responsive"> -->
            <table id="table" class="table table-striped nowrap" style="width:100%">
                <!-- <table class="table table-striped" id="table"> -->
                <thead>
                    <tr>
                        <th>
                            <?php echo lang('manage_table_staff_title_id'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_username'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_full_name'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_email'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_phone'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_last_login'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_action'); ?>
                        </th>
                        <!-- <th>
                            <?php echo lang('manage_table_staff_title_group'); ?>
                        </th>
                        <th>
                            <?php echo lang('manage_table_staff_title_address'); ?>
                        </th> -->
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <!-- </div> -->

        </div>
        <div class="card-footer bg-whitesmoke">
            This is card footer
        </div>
    </div>
</div>
