<script type="text/javascript">
  $(document).ready(function() {
    $("#inputUserGroupsSelect").attr(
      "data-placeholder", "Pilih grup pengguna"
    );

    var data_groups = [
      <?php
      if ($groups) {
          foreach ($groups as $gp) { ?>
      {
        id: '<?php echo $gp->id;?>',
        text: '<?php echo strtoupper($gp->name).' - #'.$gp->description;?>'
      },
      <?php }
      } ?>
    ];

    $("#inputUserGroupsSelect").select2({
      data: data_groups,
      language: "id",
    }) <?php if ($url3 == "edit") { ?> .val( '<?php echo $currentGroups->id; ?>').trigger('change'); <?php } ?>
  });
</script>