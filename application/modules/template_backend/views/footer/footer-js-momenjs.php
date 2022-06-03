<!-- LIBRARY MOMENJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/id.js"></script>
<script type="text/javascript">
  <?php
    $user['user'] = $this->ion_auth->user()->row();
    $this->last_login = $user['user']->last_login;
  ?>
  var last_login = moment.unix(<?php echo $this->last_login; ?>).fromNow();
  document.getElementById("last-login").innerHTML = last_login;
</script>
