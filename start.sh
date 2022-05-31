git clone https://github.com/Laradock/laradock.git
mv .env.example .env
cd laradock
mv .env.example .env
docker-compose up nginx mysql phpmyadmin redis workspace
