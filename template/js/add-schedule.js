$(function() {
    $('.btn-add-schedule').on('click', function(add_event) {
        add_event.preventDefault();

        if($('.schedule-list li').last().find('input').val() != '') {

            var new_list_item  = '<li>';
            new_list_item += '  <input name="schedule[]" type="number" placeholder="წინა პროცედურიდან..." class="form-control input-md">';
            new_list_item += '  <button class="btn btn-danger btn-remove-schedule"><i class="fa fa-minus" aria-hidden="true"></i></button>';
            new_list_item += '</li>';

            $('.schedule-list').append(new_list_item);
        }

        $('.btn-remove-schedule').on('click', function(remove_event) {
            remove_event.preventDefault();
            $(this).parent().remove();
        });
    });

    if($('.btn-remove-schedule').length > 0) {
        $('.btn-remove-schedule').on('click', function(remove_event) {
            remove_event.preventDefault();
            $(this).parent().remove();
        });
    }
});