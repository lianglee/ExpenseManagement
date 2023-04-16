$(document).ready(function() {
    var cYear = (new Date).getFullYear();
    var alldays = Ossn.Print('datepicker:days');
    var shortdays = alldays.split(",");
    var allmonths = Ossn.Print('datepicker:months');
    var shortmonths = allmonths.split(",");

    var datepick_args = {
        changeMonth: false,
        changeYear: false,
        dateFormat: 'dd/mm/yy',
        startDate: new Date($('.expense').attr('data-year'), $('.expense').attr('data-month') - 1, '01'),
        endDate: new Date($('.expense').attr('data-year'), $('.expense').attr('data-month') - 1, '31'),
        hideIfNoPrevNext: true,
    };
    if (Ossn.isLangString('datepicker:days')) {
        datepick_args['dayNamesMin'] = shortdays;
    }
    if (Ossn.isLangString('datepicker:months')) {
        datepick_args['monthNamesShort'] = shortmonths;
    }
    $("input[name='expnesedate']").datepicker(datepick_args);
    $("input[name='expnesedate']").datepicker('setDate', new Date());
    console.log($('.expense').attr('data-month'));
    $('body').on('click', '.expense .remove-item', function() {
        $count = $('.expense-form-item').length;
        if ($count > 1) {
            $('.expense-form-item:last').remove();
        }

        $count = $('.expense-form-item').length;
        if ($count == 1) {
            $('.expense .remove-item').addClass('hidden');
        }
    });
    $('body').on('click', '.expense .add-item', function() {
        $html = '<div class="row expense-form-item"> <div class="col-md-6"> <input type="text" class="fa" name="items[]" placeholder="&#xf02a ' + Ossn.Print('em:itemname') + '"/> </div> <div class="col-md-6"> <input type="number" step="0.01" class="fa" name="price[]" placeholder="&#xf0d6 ' + Ossn.Print('em:price') + '"/> </div> </div>';

        $('.remove-item').removeClass('hidden');
        $('.expense .items-enter').append($html);
    });
    $('body').on('click', '.expense-item-delete', function(e) {
        e.preventDefault();
        $url = $(this).attr('href');
        $guid = $(this).attr('data-guid');

        Ossn.PostRequest({
            url: $url,
            action: false,
            beforeSend: function() {
                $('.expense-lists-item-' + $guid).find('.ossn-loading').remove();
                $('.expense-lists-item-' + $guid).find('.buttons a').hide();
                $('.expense-lists-item-' + $guid).find('.buttons').append('<div class="ossn-loading"></div>');
            },
            callback: function(callback) {
                if (callback == 1) {
                    $('.expense-lists-item-' + $guid).fadeOut('slow');
                    $ammount = parseFloat($('.expense-lists-item-' + $guid).find('.ammount').text());
                    $ammount_new = parseFloat($('.expense-list-container .total').text()) - $ammount;
                    $('.expense-list-container .total').text($ammount_new);
                }
                if (callback == 0) {
                    $('.expense-lists-item-' + $guid).find('.ossn-loading').remove();
                    $('.expense-lists-item-' + $guid).find('.buttons a').show();
                }
            }
        });
    });
    $('body').on('click', '.expense-search-list', function() {
        $('#expense-search').submit();
    });
});
$(document).ready(function() {
		$('body').on('change', '.expense select[name="year"]', function(){
					$('#expense-select-year').submit();
		});
		$('body').on('click', '.expense-month', function(){
					if(!$(this).hasClass('expense-month-faded')){
							Ossn.redirect('expensemanagement/view/'+$(this).attr('data-month')+'/'+$(this).attr('data-year'));
					}
		});
});