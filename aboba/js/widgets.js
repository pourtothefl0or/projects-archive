/* Показать/скрыть контент внутри виджетов */
const widgets = document.querySelectorAll('.widget');

// Находим все виджеты на странице
widgets.forEach(function (widget) {
    // Проверяем клик внутри виджета
    widget.addEventListener('click', function (e) {
        // При нахождении клика добавление класса
        if (e.target.classList.contains('widget__title')) {
            e.target.classList.toggle('active');
            e.target.nextElementSibling.classList.toggle('active');
        }
    });
});
