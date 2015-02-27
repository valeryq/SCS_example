#SCS Example#

## Установка (dev version)

```php
composer up
php artisan migrate --seed
```

После этого создаем БД и изменяем конфиги в `app/config/local/database.php`

Затем, в `app/public/AngularRESTApplication`

```php
bower up
npm up
```

Меняем `API_URL` в `app/public/AngularRESTApplication/src/app/index.js` на хост, где будет развёрнуто приложение.

####Для запуска фронтенда (dev version)
```php
gulp serve
```