## API
```
Content-Type: application/json
```
# Пользователи
#### Все пользователи
```
GET http://localhost:8000/api/users
```
#### Один пользователь
```
GET http://localhost:8000/api/users/1
```
#### Создать пользователя
```
POST http://localhost:8000/api/users

name : обязательное, текс, 255 символов
email : обязательное, текс, email
phone : обязательное, текс
passport_number : обязательное, цыфры
password : обязательное, текс, min: 8 символов,
```
#### Обновить пользователя
```
PUT http://localhost:8000/api/users/1

name : обязательное, текс, 255 символов
email : обязательное, текс, email
phone : обязательное, текс
passport_number : обязательное, цыфры
password : обязательное, текс, min: 8 символов,
```
#### Удалить пользователя
```
DELETE http://localhost:8000/api/users/1
```

# Заявки
#### Все заявки
```
GET http://localhost:8000/api/list
```
#### Одна заявка
```
GET http://localhost:8000/api/list/1
```
#### Создание заявки
```
POST http://localhost:8000/api/list

user_id : обязательное, цыфры
address : обязательное, текс, max:255 символов
description : обязательное, текс, max:255 символов
animal_type_id : обязательное, id c таблицы animal_types
price : обязательное, текс
```
#### Обновления заявки
```
PUT http://localhost:8000/api/list/1

user_id : обязательное, цыфры
address : обязательное, текс, max:255 символов
description : обязательное, текс, max:255 символов
animal_type_id : обязательное, id c таблицы animal_types
price : обязательное, текс
```
#### Удалить заявку
```
DELETE http://localhost:8000/api/list/1
```
