# Huebanden

## Getting started

### Env 
* Set up the .env file first, since both Docker and Laravel will be using values from this file.

### Docker

Install docker https://www.docker.com/products/docker-desktop

`docker-compose build` // Not even sure this needs to run?! 😃

`docker-compose up`

### Laravel init

`docker exec -it app composer install ` // App contianer might not have composer (try it out)

`docker exec -it app npm run dev ` // App contianer might not have npm (try it out)

`docker exec -it app php artisan migrate `

## Collaborators

[huesimon](https://github.com/huesimon)

[AndreasPB](https://github.com/andreaspb)


