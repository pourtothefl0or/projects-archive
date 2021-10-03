/* Показать/скрыть контент внутри виджетов */
const widgets = document.querySelectorAll('.search-menu');

// Находим все виджеты на странице
widgets.forEach(function (widget) {

    // Слушаем клик внутри виджета
    widget.addEventListener('click', function (e) {
        // Если клик по заголовку - тогда скрываем/показывае тело виджета
        if (e.target.classList.contains('btn-menu')) {
            e.target.classList.toggle('active');
            e.target.nextElementSibling.classList.toggle('active');
        }
    });
});