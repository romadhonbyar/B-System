<?php $this->load->view('template_backend/footer/footer-js-general'); ?>

<!-- JS Libraies -->
<script
  src="<?php echo base_url('assets/backend/base/plugins/jquery-pwstrength/jquery.pwstrength.min.js'); ?>">
</script>
<script
  src="<?php echo base_url('assets/backend/base/plugins/disableautofill/src/jquery.disableAutoFill.min.js'); ?>">
</script>

<!-- Template JS File -->
<script
  src="<?php echo base_url('assets/backend/base/js/scripts.js'); ?>">
</script>
<!-- <script src="<?php echo base_url('assets/backend/base/js/custom.js'); ?>">
</script> -->

<!-- Validation -->
<script type="text/javascript">
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      var form = document.getElementById('needs-validation');
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    }, false);
  })();
</script>

<!-- Page Specific JS File -->
<script
  src="<?php echo base_url('assets/backend/base/js/page/auth-register.js'); ?>">
</script>
<?php $this->load->view('template_backend/footer/footer-js-btn-submit-load'); ?>
</body>

</html>