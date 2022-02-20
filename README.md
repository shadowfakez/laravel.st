ДЗ 10. Laravel. Установка

Создать и настроить проект на базе фреймворка Laravel.

1. Настроить виртуальный хост для нового проекта.
2. Создать базу данных для нового проекта
3. С помощью композера создать Laravel проект.
4. Сделать соответствующие настройки:
5. Разрешить серверу запись в папки кешей и логов
6. Сгенерировать с помощью команды artisan ключ приложения
7. Добавить в переменные окружения настройки базы данных
8. Изучить структуру директорий проекта

=========================================================

ДЗ 11. Task manager. Роуты и контроллеры

Настроить роуты для учебного Laravel проекта - таск менеджера.

1. Создать 3 контроллера:

а) для домашней страницы, с произвольным методом.

б) для пользователей, с 4 методами регистрации, авторизации, просмотра и удаления.

в) для тасков - ресурсный контроллер (создать с помощью artisan команды)

2. Настроить роуты для этих 3 сущностей:

a) для домашней страницы, один именованый роут методом GET.

б) для пользователей именованные роуты: регистрация (POST), авторизация (POST), просмотр пользователя (GET), удаление (DELETE).

в) для тасков - ресурсный роут.

3. Группировать роуты для пользователя (по имени и/или префиксу).

4. В соответствующих методах контроллеров временно возвращать произвольные строки, которые позволит определить, что вашы методы отрабатывает по соответствующим запросам.

---------------------------------------------------------
=> коммит HW11-Task manager. Роуты и контроллеры

=========================================================

ДЗ 12. Laravel. Migrations

I. Миграции

Добавить таблицы для своего учебного проекта (Task Manager): задачи (tasks), статусы (statuses), метки (labels) и промежуточная таблица для связи задач и меток (task_label).

1. Создать миграции для этих 4 таблиц:

a) Поля таблицы tasks:

id - автоинкрементный первичный ключ (bigint unsigned)
creator_id - идентификатор пользователя, который добавляет запись. Сделать внешний ключ на таблицу users поле id
title - заголовок таска
content - описание таска
status_id - статус заказа, добавить внешний ключ на таблицу statuses поле id (учесть что первой должна запускаться миграция по статусам)
created_at дата создания, тип timestamp
updated_at дата обновления, тип timestamp
b) Поля statuses:

id - автоинкрементный первичный ключ (bigint unsigned)
name - название статуса
created_at дата создания, тип timestamp
updated_at дата обновления, тип timestamp
c) Поля таблицы labels

id - автоинкрементный первичный ключ (bigint unsigned)
name - название метки
color - цвет метки
created_at дата создания, тип timestamp
updated_at дата обновления, тип timestamp
d) Поля таблицы task_label:

task_id - добавить внешний ключ на таблицу tasks поле id
label_id - добавить внешний ключ на таблицу labels поле id
2. Выполнить миграции

II. Сидеры

1. Добавить 2 сидера: для начального наполнения таблиц статусов и меток.

a) Добавить дефолтные статусы:

to do
in progres
done
b) Добавить дефолтные метки:

bug
feature
urgent
2. Запустить сидеры

---------------------------------------------------------
=> коммит added migrations and seeders. Done with hw 12 Laravel. Migrations
=========================================================
ДЗ 13. Task manager entities

1. Создать классы сущностей: Task, Status, Label

2. Описать отношения для каждой из сущностей

для Task: status (один ко многим обратное отношение) и labels (многие ко многим)
для Status: tasks (один ко многим)
для Label: tasks (многие ко многим)

---------------------------------------------------------
=> коммит HW13. Task manager entities.

=========================================================

ДЗ 14. Сервис истории

Написать кастомный сервис, который будет сохранять историю изменений задач.

1. Создать класс сервиса, и нужные методы. На входе может получать id задачи и массив измененных полей.

2. Добавить таблицу, необходимые модели и отношения.

3. Добавить отдельный сервис-провайдер, регистрировать сервис можно как синглтон, например.

4. Какие поля и в каком виде хранить предлагается сделать на ваше усмотрение.
---------------------------------------------------------
1. Создал класс History, добавил методы checkTitle, checkContent, checkStatus, в которых происходит проверка на наличие изменений в title, content и status соответственно. В save() вызываются эти методы. В случае наличия изменений в таблицу history_logs добавляется соответствующая запись(или записи, если изменений несколько).
2. Добавлена миграция CreateHistoryLogsTable с полями task_id , changing_column, before, after, а так же внешний ключ, связывающий task_id и id в таблице task. Добавлена модель HistoryLog.
3. Добавлен сервис-провайдер HistoryServiceProvider( App\Providers), зарегистрирован как синглтон.
=> коммит done with hw14 - history service
=========================================================
ДЗ 15. Фасад

Добавить фасад для своего сервиса из предыдущего урока - для сервиса сохранения истории
---------------------------------------------------------
коммит hw15 - facade for history service

=========================================================
ДЗ 16. Формы создания/редактирования тасков

Добавить 2 шаблона с формами для создания и редактирования задачи.

1. Создать layout (макет) для основных страниц сайта.

2. Создать шаблоны (template), которые должны расширять layout. В шаблонах сделать формы с необходимыми полями. В форме редактирования нужно получить существующую сущность и заполнять значениями соответствующие поля.

3. Реализовать соответствующие методы контроллера для форм (форма создания, форма редактирова) и для сохранения и обновления записей. Добавить валидацию для последних 2 методов.

Опционально:

В случае ошибки добавления/редактирования вывести сообщение об ошибках на странице после редиректа
---------------------------------------------------------
1. Основной макет: resources/views/layouts/layout.blade.php.
2. Шаблоны для создания и редактирования: resources/views/tasks/create.blade.php, resources/views/tasks/edit.blade.php.
3. app/Http/Controllers/TaskController.php методы create, store, edit, update. Валидацию реализовал в app/Http/Requests/TaskRequest.php

=> коммит - hw16 - forms
=========================================================












