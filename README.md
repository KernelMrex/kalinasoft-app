# Тестовое задание

## Методы
### Регистрация
```http request
POST /api/register HTTP/1.1
Host: 127.0.0.1
Content-Type: application/x-www-form-urlencoded
Content-Length: 121

first_name=test&middle_name=testovich&last_name=testov&email=testov5%40test.com7&phone=%2B71234567894&password=Qwerty1%23
```

###  Вход
```http request
POST /api/login HTTP/1.1
Host: 127.0.0.1
Content-Type: application/x-www-form-urlencoded
Content-Length: 66

email=testov5%40test.com7&phone=%2B71234567894&password=Qwerty1%23
```

### Получения страницы продуктов
```http request
GET /api/shop/products?page_num=0&page_size=40 HTTP/1.1
Host: 127.0.0.1
Authorization: Bearer <тут токен>
Content-Type: application/x-www-form-urlencoded
Content-Length: 66

email=testov5%40test.com7&phone=%2B71234567894&password=Qwerty1%23
```

## Команды проекта
### Запуск контейнеров
```bash
./bin/kalinasoftappstart
```

### Остановка контейнеров
```bash
./bin/kalinasoftappstop
```

### Выполенение Laravel команды в контейнере
```bash
./bin/kalinasoftappcommand <command>
```
