<!-- CUSTOM FILE INPUT -->
<script>
    /** Show Filename file upload */
    $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        let label = $(this).siblings('.custom-file-label');

        if (label.data('default-title') === undefined) {
            label.data('default-title', label.html());
        }

        if (fileName === '') {
            label.removeClass("selected").html(label.data('default-title'));
        } else {
            label.addClass("selected").html(fileName);
        }
    });
</script>