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
email: default@app.com
password: password
```

# API Spec

## Add Header
- Content-Type : "application/json"
- Accept : "application/json"


## No Authentication

## Login

Request :
- Method : POST
- Endpoint : `/api/auth/login`
- Body : 

    ```json
    {
        "email": "default@app.com",
        "password": "password"
    }
    ```

Response :
```json
{
    "data": {
        "token": "secret token"
    }
}
```

## Register

Request :
- Method : POST
- Endpoint : `/api/auth/register`
- Body : 

    ```json
    {
        "name": "default2",
        "email": "default2@app.com",
        "password": "password"
    }
    ```

Response :
```json
{
    "data": {
        "name": "default2",
        "email": "default2@app.com",
        "updated_at": "2023-07-05T17:00:24.000000Z",
        "created_at": "2023-07-05T17:00:24.000000Z",
        "id": 2
    }
}
```

## With Authentication

Request :
- Method : POST
- Endpoint : `/api/auth/register`
- Body : 

    ```json
    {
        "name": "default2",
        "email": "default2@app.com",
        "password": "password"
    }
    ```

Response :
```json
{
    "data": {
        "name": "default2",
        "email": "default2@app.com",
        "updated_at": "2023-07-05T17:00:24.000000Z",
        "created_at": "2023-07-05T17:00:24.000000Z",
        "id": 2
    }
}
```
