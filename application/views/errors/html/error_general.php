<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Error | <?php echo $heading; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo config_item('base_url').'assets/backend/base/css/master.css'; ?>">
	<link rel="stylesheet" href="<?php echo config_item('base_url').'assets/backend/base/css/components.css'; ?>">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              <?php echo $message; ?>
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="<?php echo config_item('base_url'); ?>">Refresh</a>
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
