/* Показать/скрыть контент внутри виджетов */
const widgets = document.querySelectorAll('.widget-item');

// Находим все виджеты на странице
widgets.forEach(function (widget) {

    // Слушаем клик внутри виджета
    widget.addEventListener('click', function (e) {
        // Если клик по заголовку - тогда скрываем/показываем тело виджета
        if (e.target.classList.contains('widget-item-header')) {
            e.target.classList.toggle('widget-item-header--active')
            e.target.nextElementSibling.classList.toggle('active');
        }
    });
});