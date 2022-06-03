<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Database Error | <?php echo $heading; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo config_item('base_url').'vendor/twbs/bootstrap/dist/css/bootstrap.min.css'; ?>" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo config_item('base_url').'vendor/components/font-awesome/css/all.min.css'; ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo config_item('base_url').'assets/backend/base/css/master.css'; ?>">
    <link rel="stylesheet" href="<?php echo config_item('base_url').'assets/backend/base/css/components.css'; ?>">

    <!-- CSS Libraries -->
  </head>

  <body>
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="page-error">
            <div class="page-inner">
              <h2>404</h2>
              <div class="page-description">
                <?php echo $message; ?>
              </div>
              <div class="page-search">
                <div class="mt-3">
                  <a href="<?php echo config_item('base_url'); ?>">Muat ulang</a>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="simple-footer mt-5">
            Copyright &copy; QRCOMO 2019
          </div> -->
        </div>
      </section>
    </div>
  </body>
</html>
