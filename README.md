- Altere o nome do arquivo de .env.production para .env, poderá utilizar o comando: cp .env.production .env
- Navege até a pasta docker e execute o comando: sudo docker-compose up --build -d
- Após fazer o build do docker será necessário entrar dentro do container chamado: revendamais-php-fpm, utilizando o comando: sudo docker exec -it revendamais-php-fpm bash
- Execute os comandos
    - composer install
    - chown -R www-data:www-data bootstrap/cache
    - chown -R www-data:www-data storage
    - php artisan optimize
    - php artisan migrate --seed
   
**Caso aconteça algum erro de permissão, entre novamente no container e utilize os comandos**
- chown -R www-data:www-data bootstrap/cache
- chown -R www-data:www-data storage
