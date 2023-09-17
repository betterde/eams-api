# EAMS

## Installation

```
git clone git@github.com:betterde/eams-api.git eams/api

brew install mkcert

cd eams/api

mkcert -cert-file docker/nginx/certs/fullchain.cer -key-file docker/nginx/certs/fullchain.key "*.orb.local"

cp .docker.env.example .docker.env
docker compose --env-file .docker.env up -d

docker compose --env-file .docker.env exec -it fpm bash

composer install --no-dev

php artisan migrate --seed

php artisan admin:install

php artisan passport install
```

## Deployment

> Please set heroku stack is heroku-20.