<script src="<?php echo  base_url('assets/backend/plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
<script type="text/javascript">

  $(document).ready(function() {
    $("#groups_select").attr(
       "data-placeholder","Please select an skill"
    );

    var data_groups = [
       <?php if($groups) { foreach($groups as $gp) { ?>
       { id: '<?php echo $gp->id;?>', text: '<?php echo strtoupper($gp->name).' - #'.$gp->description;?>' },
       <?php } } ?>
    ];

   $("#groups_select").select2({
     data: data_groups,
     placeholder: "Select group",
     allowClear: true,
     language: "id",
     minimumResultsForSearch: Infinity
   })<?php if($url2 == "edit"){?>.val('<?php echo $currentGroups->id; ?>').trigger('change')<?php } ?>;
  });
</script>
