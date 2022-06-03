<script>
/** Handel error */
function handleAjaxError(xhr, textStatus, error) {
    console.log(xhr)
    if (textStatus === 'timeout') {
        swal('The server took too long to send the data.')
    } else {
        swal('Terjadi kesalahan: ' + xhr.status + " " + xhr.statusText)
            .then((value) => {
                location.reload();
        });
    }
    /** myDataTable.fnProcessingIndicator( false ); */
}
</script>