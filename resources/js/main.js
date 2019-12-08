$(document).ready(function() {
    if ($('.jsErrorNotAuth').length) {
        toastr.warning('Ошибка авторизации!', 'Вы не авторизованы!');

        $([document.documentElement, document.body]).animate({
            scrollTop: $(".jsAuthScroll").offset().top
        }, 2000);
    }
});
