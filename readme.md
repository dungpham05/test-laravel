# run docker-compose to deploy server up
- docker-compose build
- docker-compose up -d

# setting environment
- chmod -R 777 storage
- copy or rename a .env.example to .env
- composer i
- npm i

# reset all config (to access php into docker. "docker exec -it php-test-laravel bash")
- php artisan cache:clear
- php artisan config:clear
- php artisan config:cache
- php artisan view:clear

# run migration
- php artisan migrate

# run npm
- npm run dev

# create user (admin, browser)
localhost/register

# create token user (api, postman)
localhost/api/login

# create a blog
localhost/api/create
- add to header `Accept: application/json`, `Authorization: bearer {token after login will show}`
- add to body by raw-json `{
    "title": "ex",
    "description": "ex",
    "content": "ex",
    "slug": "ex"
}`

# update a blog
localhost/api/create
- add to header `Accept: application/json`, `Authorization: bearer {token after login will show}`
- add to body by raw-json `{
    "id": "1"
    "title": "fix",
    "description": "fix",
    "content": "fix",
    "slug": "fix"
}`

# delete a blog
localhost/api/delete
- add to header `Accept: application/json`, `Authorization: bearer {token after login will show}`
- add to body by raw-json `{
    "id": "1"
}`

# get list a blog
localhost/api/list
- add to header `Accept: application/json`, `Authorization: bearer {token after login will show}`

# get detail a blog
localhost/api/detail
- add to header `Accept: application/json`, `Authorization: bearer {token after login will show}`
- add to body by raw-json `{
    "id": "1"
}`
