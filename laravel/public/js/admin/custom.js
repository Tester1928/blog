$(document).ready(function () {
    $('#file-input').change(function () {

        let files = this.files;

        $(files).each(function (index, file) {
            $('.upload-image-wrap').html('<img class="load-photo" src="' + URL.createObjectURL(file) + '">');
        });
    });
})
