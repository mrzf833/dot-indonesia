# Api Chat

## Dibuat Menggunakan Laravel 8 dan php 7.4

# Cara Pemasangan

## Create Pusher Terlebih Dahulu

## Clone Source Code Ini, Lalu Jalankan

- `composer install`
- `cp .env.example .env`
- `buka dan setting .env nya yaitu`
    - `Sesuaikan Databasenya`
    - `ganti BROADCAST_DRIVER=log menjadi BROADCAST_DRIVER=pusher`
    - `Sesuaikan Data Pusher`
- `php artisan key:generate`
- `php artisan jwt:secret`
- `php artisan migrate:fresh --seed`

## dengan docker compose
- `docker-compose build app`
- `docker-compose up -d`
- `docker-compose ps`
- masuk dulu dengan user root `docker-compose exec -u root -it app /bin/sh`
- `composer install`
- `cp .env.example .env`
- `buka dan setting .env nya yaitu`
    - `Sesuaikan Databasenya`
    - `ganti BROADCAST_DRIVER=log menjadi BROADCAST_DRIVER=pusher`
    - `Sesuaikan Data Pusher`
- `php artisan key:generate`
- `php artisan jwt:secret`
- migrate db dilakukan sekali saja `php artisan migrate:fresh --seed`

## Jika Sudah Memasang Api Chatnya Silahkan Lanjutkan pemasangan Frontendnya ya itu <a href="https://github.com/mrzf833/web-chat.git">Web Chat</a>

# USER Default

```
1. username: user1
1. password: user1

2.username: user2
2.password: user2
```

# API Spec



## No Authentication

## Login

Request :
- Method : POST
- Endpoint : `/api/login`
- Body : 

    ```json
    {
        "username" : "required",
        "password" : "required"
    }
    ```

Response :
```json
{
    "token" : "secret api key"
}
```

## Register

Request :
- Method : POST
- Endpoint : `/api/login`
- Body : 

    ```json
    {
        "username" : "required",
        "password" : "required"
    }
    ```

Response :
```json
{
    "message": "user berhasil di buat"
}
```
