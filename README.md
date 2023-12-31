# Api Dot Indonesia

## Dibuat Menggunakan Laravel 8 dan php 8.1.10

# Cara Pemasangan Manual

## Clone Source Code Ini, Lalu Jalankan

- `composer install`
- `buka dan setting .env nya yaitu`
    - `Sesuaikan Databasenya`
    - `Sesuaikan rajaongkirnya di paling bawah`
- `php artisan key:generate`
- `php artisan migrate:fresh --seed`

# Cara Pemasangan Dengan Docker
- `buka dan setting .env nya yaitu`
    - `Sesuaikan Databasenya`
    - `Sesuaikan rajaongkirnya di paling bawah`
- `docker-compose build app`
- `docker-compose up -d`
- `docker-compose exec -u root -it app /bin/sh`
- `composer install`
- `php artisan key:generate`
- `php artisan migrate:fresh --seed`
- `chmod -R 777 /var/www/storage`
- `chmod -R 777 /var/www/bootstrap/cache`


# USER Default

```
email: default@app.com
password: password
```

# Artisan Command fetching API data provinsi & kota dan data disimpan ke dalam database
- `php artisan rajaongkir:exec`

# Unit Testing Command
- `php artisan test`

# Swapable Implementation DB atau rajaongkir
```
setting di .env yang di key SWAP_RAJAONGKIR_OR_DB dan diisi dengan rajaongkir ATAU db
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
