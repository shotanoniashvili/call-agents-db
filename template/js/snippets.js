$(function() {

    $('.btn-set-point').on('click', function(e) {
        var btn = $(this);
        var input = $(this).prev();
        var point = $(input).val();
        var criteria = $(this).attr('data-criteria');
        var branch =  $('.branch-select').val();
        var section =  $('.section-select').val();

        $.ajax({
            method: "POST",
            url: window.location.href,
            data: { action: 'rate-section', branch: branch, section: section, criteria: criteria, point: point }
        }).done(function(msg) {
            $(btn).attr('disabled','');
            $(input).attr('disabled','');
        });
    });

    $('.btn-vote-category').on('click', function(e) {
        e.preventDefault();

        var category = $(this).attr('data-category');
        var category_tr = $('#category-'+category);

        var set_points = $(category_tr).find('.btn-set-point');

        $( set_points ).each(function( index ) {
            var obj = set_points[index];
            $(obj).attr('disabled','');
            $(obj).prev().attr('disabled','');
            $(obj).trigger('click');
        });
    });

});
