/*
    Dosya yükleme işlemi
*/
jQuery(function ($) {
    if ($('.logo-content').find('img').length > 0) {
        $('label[for=logo]').hide();
    }

    $('.logo-content button.remove-file').on('click', function () {
        $('.logo-content').html('');
        $('label[for=logo]').show();
    });

    $('input[name=logo]').on('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        var fileName = $(this).prop('files')[0]?.name || "Dosya seçilmedi";

        $('.logo-content').html('<span>'+ fileName +'</span> \
            <button type="button" class="btn btn-sm btn-danger remove-file">Sil</button>');
        $('label[for=logo]').hide();

    });

    $(document).on('click', '.remove-file', function () {
        const input = $('input[name=logo]')[0];

        input.value = '';
        $(this).parent().html('');
        $('label[for=logo]').show();
    });

});
