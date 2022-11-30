## Требования к установке

- PHP 8.1
- Composer

## Установка


``git clone https://github.com/ashen-1-dev/routes``

```composer install```

Заполнить ``.env``-файл (пример можно взять из ``.env.example``)

Выполнить миграцию ``php artisan migrate``

## Доступные команды

``php artisan db:seed`` - Заполнить БД начальными значениями <br>
``php artisan city:fill`` - Записать для всех городов в БД свой регион и округ <br>
``php artisan routes:show`` - Показать все существующие направления в виде таблицы
