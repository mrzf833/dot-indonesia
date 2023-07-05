# Api Dot Indonesia

## Dibuat Menggunakan Laravel 8 dan php 8.1.10

# Cara Pemasangan

## Clone Source Code Ini, Lalu Jalankan

- `composer install`
- `buka dan setting .env nya yaitu`
    - `Sesuaikan Databasenya`
- `php artisan key:generate`
- `php artisan migrate:fresh --seed`

# USER Default

```
1. email: default@app.com
1. password: password

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
