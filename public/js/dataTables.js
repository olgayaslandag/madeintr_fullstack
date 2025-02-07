jQuery(function($) {
    const table = $('.d-table').DataTable({
        dom: 'rt<"mb-3"><"d-flex justify-content-between"ip>B',
        searching: true,
        pageLength: 50,
        bInfo: true,
        ordering: true,
        lengthChange: false, // "Kaç kayıt gösterilsin?" seçeneğini kaldırır
    });

    $('header form.form-search').on('submit', function(e){
        e.preventDefault();
    });

    $("header form.form-search input[type=search]").on('keyup', function(){
        table.search($(this).val()).draw();
    });
});
