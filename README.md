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
        "token": "secret api key"
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

# With Authentication

## Add Authentication Header
- Authorization : "Bearer " + "your secret api key"

## User
Request :
- Method : GET
- Endpoint : `/api/auth/user`

Response :
```json
{
    "data": {
        "id": 1,
        "name": "Default User",
        "email": "default@app.com",
        "email_verified_at": "2023-07-05T11:57:38.000000Z",
        "created_at": "2023-07-05T11:57:38.000000Z",
        "updated_at": "2023-07-05T11:57:38.000000Z"
    }
}
```

## Logout
Request :
- Method : POST
- Endpoint : `/api/auth/logout`

Response :
```json
{
    "message": "user berhasil logout"
}
```

## Search Province
Request :
- Method : GET
- Endpoint : `/api/search/provinces?id={province_id}`

Response :
```json
{
    "message": "OK",
    "results": {
        "province_id": "21",
        "province": "Nanggroe Aceh Darussalam (NAD)"
    }
}
```

## Search City
Request :
- Method : GET
- Endpoint : `/api/search/city?id={city_id}`

Response :
```json
{
    "message": "OK",
    "results": {
        "city_id": "21",
        "province_id": "18",
        "type": "Kota",
        "city_name": "Bandar Lampung",
        "postal_code": "35139",
        "province": "Lampung"
    }
}
```
