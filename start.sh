git clone https://github.com/Laradock/laradock.git
cp .env.example .env
cd laradock
cp .env.example .env
docker-compose up -d nginx mysql phpmyadmin redis workspace
docker-compose exec workspace bash
composer install
