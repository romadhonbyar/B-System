<!-- Button Submit Load -->
<script type="text/javascript">
  $(".btn-submit-load").click(function(){
    $(window).on("beforeunload", function(e) {
      $("button.btn-submit-load").html('Proses...');
      $("button.btn-submit-load").removeClass("btn-warning");
      $("button.btn-submit-load").addClass("btn-danger disabled btn-progress");
      $(window).on("load", function(e) {
        $('button.btn-submit-load').removeClass('btn-danger disabled btn-progress');
        $("button.btn-submit-load").addClass("btn-warning");
        $("button.btn-submit-load").html('Simpan');
      });
    });
  });
</script>
