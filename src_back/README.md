# App: Витрина авто



**Запуск**

1. cd docker && docker-compose up
2. docker-compose run php-fpm bin/console doctrine:schema:create
3. docker-compose run php-fpm bin/console doctrine:fixtures:load
4. Открыть в брузере [127.0.0.1:80](http://127.0.0.1:80)