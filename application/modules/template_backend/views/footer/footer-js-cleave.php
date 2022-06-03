<!-- Library Money & Phone Number -->
<script src="<?php echo base_url('assets/backend/base/plugins/cleave-js/dist/cleave.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/base/plugins/cleave-js/dist/addons/cleave-phone.id.js'); ?>"></script>

<script type="text/javascript">  

  $('.phone-number').toArray().forEach(function(field){
    new Cleave(field, {
      phone: true,
      phoneRegionCode: 'id'
    });
  });
  
  $('.currency').toArray().forEach(function(field){
    new Cleave(field, {
      numeral: true,
      numeralDecimalMark: 'thousand',
      delimiter: '.'
    });
  });
  
</script>