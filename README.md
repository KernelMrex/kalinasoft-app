# Тестовое задание

## Методы
### Регистрация
```http request
POST /api/auth/register HTTP/1.1
Host: 127.0.0.1
Content-Type: application/x-www-form-urlencoded
Content-Length: 121

first_name=test&middle_name=testovich&last_name=testov&email=testov5%40test.com7&phone=%2B71234567894&password=Qwerty1%23
```

###  Вход
```http request
POST /api/auth/login HTTP/1.1
Host: 127.0.0.1
Content-Type: application/x-www-form-urlencoded
Content-Length: 66

email=testov5%40test.com7&phone=%2B71234567894&password=Qwerty1%23
```

### Получения страницы продуктов
```http request
GET /api/shop/products?page_num=0&page_size=40&properties[color]=red HTTP/1.1
Host: 127.0.0.1
Authorization: Bearer $2y$10$ipdSrL73NTKbAt184gGQGetNF1kJex1l96dBPB1BotQb/WtswL64i
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
