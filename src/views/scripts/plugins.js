$.fn.populateSelect = function(data, options) {
    var settings = $.extend({
        empty: $(this).data('empty') || $(this).find('option:first').text(),
        selected: $(this).val() || false,
        value: 'id',
        label: 'nombre'
    }, options);

    $(this).data('empty', settings.empty);

    var $options = (settings.empty !== '') ? '<option value="">' + settings.empty + '</option>' : '';

    $.each(data, function() {
        $options += '<option value="' + this[settings.value] + '"' + (settings.selected && settings.selected === this[settings.value] ? ' selected="selected"' : '') + '>';
        $options += this[settings.label];
        $options += '</option>';
    });

    return this.each(function() {
        $(this).html($options);
    });
};

$.fn.populateProductSelect = function(data, options) {
    var settings = $.extend({
        empty: $(this).data('empty') || $(this).find('option:first').text(),
        selected: $(this).val() || false,
        value: 'id',
        label: 'nombre',
        image: 'foto'
    }, options);

    $(this).data('empty', settings.empty);

    var $options = (settings.empty !== '') ? '<option value="">' + settings.empty + '</option>' : '';

    $.each(data, function() {
        $options += '<option value="' + this[settings.value] + '" class="circle" data-icon="' + this[settings.image] + '"' + (settings.selected && settings.selected === this[settings.value] ? ' selected="selected"' : '') + '>';
        $options += this[settings.label];
        $options += '</option>';
    });

    return this.each(function() {
        $(this).html($options);
    });
};