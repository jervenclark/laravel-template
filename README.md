# Next Generation Alliance's Web Portal

## Local Development Setup

### Prerequisites
    - docker-compose ~v1.25
    - docker ~v19.03

### Running docker services

```sh
cd laravel
cp .env.example .env
php artisan key:generate
cd ../docker
cp env-example .env
docker-compose up -d nginx mysql phpmyadmin redis workspace
```

