$(document).ready(function () {

    $('#post-category_id').on('change', function () {
        moviesFields();
    });
    moviesFields();
    function moviesFields() {
        if ($('#post-category_id').val() == 1) {
            $('#movies_fields').show();
        } else {
            $('#movies_fields').hide();
        }
    }

    $('.input-sm').on('change', function () {
        $('#upload-file-info').html($(this).val());
    });

});












