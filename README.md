## API
```
'Accept': 'application/json, text/plain, */*'
```
# Пользователи
#### Все пользователи
```
GET /api/users
```
#### Один пользователь
```
GET /api/users/{id}
```
#### Создать пользователя
```
POST /api/users

name : обязательное, string, 255 символов
email : обязательное, string, email
phone : обязательное, string
passport_number: string
password : обязательное, string, min: 8 символов,
password_confirmation : подтверждения пароля
```
#### Обновить пользователя
```
PUT /api/users/{id}

name : string, 255 символов
email : string, email
phone : string
users_role : 'applicant','executor'
passport_number : string
is_admin : boolean
password : string, min: 8 символов,
```
#### Удалить пользователя
```
DELETE /api/users/{id}
```

# Заявки
#### Все заявки
```
GET /api/list
```
#### Одна заявка
```
GET /api/list/{id}
```
#### Создание заявки
```
POST /api/list

user_id : обязательное, integer
address : обязательное, string, max:255 символов
description : обязательное, string, max:255 символов
animal_type_id : обязательное, id c таблицы animal_types
price : обязательное, string
```
#### Обновления заявки
```
PUT /api/list/{id}

user_id : обязательное, integer
address : обязательное, string, max:255 символов
description : обязательное, string, max:255 символов
animal_type_id : обязательное, id c таблицы animal_types
price : обязательное, string
executor_user_id : integer
status : PUBLISHED, IN PROGRESS, DONE
```
#### Удалить заявку
```
DELETE /api/list/{id}
```
#### Регистрация
```
POST /api/register

name : обязательное, string, 255 символов
email : обязательное, string, email
phone : обязательное, string
passport_number: string
password : обязательное, string, min: 8 символов
password_confirmation : подтверждения пароля
```
#### Логин
```
POST /api/login

email : обязательное, string, email
password : обязательное, string, min: 8 символов
```
#### Выход
```
POST /api/logout

HEADER {
    Authorization: `Bearer <TOKEN>`
}
```
