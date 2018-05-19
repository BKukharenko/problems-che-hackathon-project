
jQuery(document).ready(function($){

        jQuery('.div-on-click').hide().addClass("hidden");

        jQuery('.start').click(function() {
            var $this = jQuery('.div-on-click');

            if ($this.hasClass("hidden")) {
                jQuery('.div-on-click').slideDown(1500).removeClass("hidden").addClass("visible");

            } else {
                jQuery('.div-on-click').slideUp(1500).removeClass("visible").addClass("hidden");
            }
        });

        jQuery('.go-anchor').click(function () {
        jQuery('html, body').animate({
            scrollTop: jQuery('.about-section').offset().top-150
        }, 800);
    });

         $('a[href^="#"]').on('click', function (e) {
                    e.preventDefault();

                    var target = this.hash;
                    var $target = $(target);

                    $('html, body').animate({
                        'scrollTop': $target.offset().top
                    }, 1000, 'swing');
                });

    function ajax_go(data, jqForm, options) { //ф-я перед отправкой запроса
        jQuery('#output').html('Надсилаю...'); // в див для ответа напишем "отправляем.."
        jQuery('#sub').attr("disabled", "disabled"); // кнопку выключим
    }
    function response_go(out)  { // ф-я обработки ответа от wp, в out будет элемент success(bool), который зависит от ф-и вывода которую мы использовали в обработке(wp_send_json_error() или wp_send_json_success()), и элемент data в котором будет все что мы передали аргументом к ф-и wp_send_json_success() или wp_send_json_error()
        console.log(out); // для дебага
        jQuery('#sub').prop("disabled", false); // кнопку включим
        jQuery('#output').html(out.data); // выведем результат
        $( '#add_object' ).each(function(){
            this.reset();
        });

    }

    add_form = jQuery('#add_object'); // запишем форму в переменную
    var options = { // опции для отправки формы с помощью jquery form
        data: { // дополнительные параметры для отправки вместе с данными формы
            action : 'add_object_ajax', // этот параметр будет указывать wp какой экшн запустить, у нас это wp_ajax_nopriv_add_object_ajax
            nonce: ajaxdata.nonce // строка для проверки, что форма отправлена откуда надо
        },
        dataType:  'json', // ответ ждем в json формате
        beforeSubmit: ajax_go, // перед отправкой вызовем функцию ajax_go()
        success: response_go, // после получении ответа вызовем response_go()
        error: function(request, status, error) { // в случае ошибки
            console.log(arguments); // напишем все в консоль
        },
        url: ajaxdata.url // куда слать форму, переменную с url мы определили вывели в нулевом шаге
    };
    add_form.ajaxForm(options); // подрубаем плагин jquery form с опциями на нашу форму

});



