
    <script src="<?php echo base_url('assets/backend/base/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script>
        $(function() {
            
            var monthNames = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            var daysOfWeek = ["Min","Sen","Sel","Rab","Kam","Jum","Sab"];
            
            if($(".memberDOB").length) {
                $('.memberDOB').daterangepicker({
                    "locale": {
                        "format": "YYYY-MM-DD",
                        "separator": " - ",
                        "applyLabel": "Pilih",
                        "cancelLabel": "Batal",
                        "daysOfWeek": daysOfWeek,
                        "monthNames": monthNames,
                        "firstDay": 0
                    },
                    "startDate": moment([<?php echo date("Y", strtotime("-72 year", strtotime(date("Y")))); ?>, 0, 1]),
                    "singleDatePicker": true,
                    "minYear": 1950,
                    "maxYear": parseInt(moment().format('YYYY'),10)-17,
                    "showDropdowns": true,
                    "autoApply": true,
                });
            }
        });
    </script>