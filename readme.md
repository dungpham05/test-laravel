# run docker-compose to deploy server up
- docker-compose build
- docker-compose up -d

# setting environment
- chmod -R 777 storage
- copy or rename a .env.example to .env
- composer i
- npm i

# reset all config (to access php into docker. "docker exec -it php-test-laravel bash")
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan view:clear

# run migration
- php artisan migrate

# run npm
- npm run dev
