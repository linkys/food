var func_post_view = {
    action: function(){
        slider();
        remove_errors();
    },
    submit: function(){

    },
    validator: function(){
        add_recipe_validator();
        register_validator();
    },
    remove: function() {

    },
    edit: function() {

    },
    show: function() {

    },
    init: function(){
        this.action();
        this.submit();
        this.validator();
        this.remove();
        this.edit();
        this.show();
    }
};

$(document).ready(function(){
    func_post_view.init();
});

function bodyOffOn(events, selector, callback){
    $('body').off(events, selector).on(events, selector, callback);
}

function slider() {

    if( $("#slider").length > 0 ) {
        $("#slider").noUiSlider({
            start: [5],
            step: 5,
            range: {
                'min': [5],
                'max': [180]
            }
        });
        $('#slider').Link('lower').to($('#slider-val'));
    }

}

function add_recipe_validator(){
    bodyOffOn('click', '.add-recipe', function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        $(form).find('.error').removeClass('error');

        var url = $(form).find('input[name="validator"]').val();
        var vals = {
            title: $(form).find('input[name="title"]').val(),
            description: $(form).find('textarea[name="description"]').val(),
            kitchen: $(form).find('select[name="kitchen"]').val(),
            type: $(form).find('select[name="type"]').val(),
            time: $(form).find('input[name="time"]').val().substr(0, $(form).find('input[name="time"]').val().length-3),
            ingredients: $(form).find('textarea[name="ingredients"]').val(),
            instruction: $(form).find('textarea[name="instruction"]').val()
            //subject: $(form).find('input[name="subject"]').val()
        };

        $.post(url, vals, function(data){
            if(data.status == true) {
                form.submit();
            } else {
                for (var i in data.error) {
                    var elem = $(form).find('[name="'+i+'"]');
                    $(elem).siblings('p.error-msg').html(data.error[i]);
                    $(elem).parents('.form-group').addClass('error');
                }
            }
        });
    });
}

function remove_errors(){
    bodyOffOn('change', 'textarea, input', function(e) {
        if ( $(this).val() != '' ) {
            $(this).parents('.form-group').removeClass('error');
        }
    });
}

function register_validator(){
    bodyOffOn('click', '.register', function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        $(form).find('.error').removeClass('error');

        var url = $(form).find('input[name="validator"]').val();
        var vals = {
            login: $(form).find('input[name="login"]').val(),
            email: $(form).find('input[name="email"]').val(),
            password: $(form).find('input[name="password"]').val(),
            password_r: $(form).find('input[name="password_r"]').val()
        };

        $.post(url, vals, function(data){
            if(data.status == true) {
                form.submit();
            } else {
                for (var i in data.error) {
                    var elem = $(form).find('[name="'+i+'"]');
                    $(elem).siblings('p.error-msg').html(data.error[i]);
                    $(elem).parents('.form-group').addClass('error');
                }
            }
        });
    });
}