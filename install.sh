git clone https://github.com/Laradock/laradock.git
cp .env.example .env
cd laradock
cp .env.example .env
docker-compose up nginx mysql phpmyadmin redis workspace
