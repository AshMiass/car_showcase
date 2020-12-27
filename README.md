## Установка ##
0. Предварительно должен быть установлен docker и git

### Поочередно запустить следующие команды (из консоли, в родительской папке где будет развернут проект)
1. git clone https://github.com/AshMiass/car_showcase.git
2. cd cd car_showcase/docker/
3. docker-compose run node npm install
4. docker-compose run php-fpm composer install
4.1 Возможно понадобиться поменять права на созданые из контейнера файлы (linux): sudo chmod 777 -R ../
5. docker-compose exec php-fpm bin/console doctrine:schema:create && docker-compose exec php-fpm bin/console doctrine:fixtures:load

### Запуск
1. Из директории docker в папке проекта выполнить: docker-compose up -d
2. Открыть в браузере http://localhost:4200/
2. Для просмотра API открыть: http://localhost/api
