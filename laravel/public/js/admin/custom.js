$(document).ready(function () {
    $('#upload-container #file-input').change(function () {

        let curOb = $(this);
        let files = this.files;

        $(files).each(function (index, file) {
            curOb.closest("#upload-container").find('.upload-image-wrap').html('<img class="load-photo" src="' + URL.createObjectURL(file) + '">');
        });
    });
})
