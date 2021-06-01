class Select {
    // $('.selectpicker').selectpicker('refresh');
    // $('.selectpicker').selectpicker(');

    static search(select_selector, search, new_setting = {}) {
        var Settings = {
            notExistText: 'No Result',
            functionWhenFinish: {},//functionWhenFinish:functionName or,functionWhenFinish:{function1Name,function2Name.........}
        };
        $.extend(Settings, new_setting);

        var select = $(select_selector);
        //check if element don't exist in dom
        if (select.length == 0) {
            console.log('select element don\'t exist!');
            return;
        }

        var state_search = false;
        //search to find search_key in option value
        $(select_selector + ' option').each(function () {
            if (($(this).html()).search(search) > -1) {
                $(this).removeClass('hidden-bootstrap-select');
                state_search = true
            } else {
                $(this).addClass('hidden-bootstrap-select');
            }
        });
        if (state_search) {//search has result
            var no_result_id = select.attr('data-no_result_id');
            if ($('#' + no_result_id).length) {
                $('#' + no_result_id).remove();
                select.removeAttr('data-no_result_id');
            }
            $(select_selector + ' option:not(.hidden-bootstrap-select):first').prop('selected', true);
        } else {
            //check if select has attr data-no_result_id
            if (!select.is('[data-no_result_id]')) {
                var no_result_id = ('select_no_result' + Math.random()).replace('0.', '');
                select.attr('data-no_result_id', no_result_id);
                select.append(
                    "<option selected id='" + no_result_id + "'>" + Settings.notExistText + "</option>"
                )
            }
        }

        if ($.isFunction(Settings.functionWhenFinish)) {
            Settings.functionWhenFinish();
        } else {
            $.each(Settings.functionWhenFinish, function (index, item) {
                if ($.isFunction(item)) {
                    item();
                }
            });
        }
    }
}
