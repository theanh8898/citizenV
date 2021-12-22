## Các bước khởi chạy
### Bước 1
``` Clone source code về ```
### Bước 2
``` Vào thưc mục source code đã clone xong, chạy git clone https://github.com/Laradock/laradock.git ```
### Bước 3
``` Vào thư mục laradock (cd laradock) xong gõ cp .env.example .env```
### Bước 4
``` Edit file .env trong thư mục laradock như sau: ```
```    ### NGINX ################################################# ```

``` NGINX_HOST_HTTP_PORT=8888 ```
``` NGINX_HOST_HTTPS_PORT=443 ```
``` NGINX_HOST_LOG_PATH=./logs/nginx/ ```
``` NGINX_SITES_PATH=./nginx/sites/ ```
```NGINX_PHP_UPSTREAM_CONTAINER=php-fpm ```
``` NGINX_PHP_UPSTREAM_PORT=9000 ```
``` NGINX_SSL_PATH=./nginx/ssl/ ```
    
```   ### MYSQL ################################################# ```
```    MYSQL_VERSION=5.7 ```
```    MYSQL_DATABASE=citizens  (tên databse mình tạo) ```
```    MYSQL_USER=root  ```
```    MYSQL_PASSWORD=root ```
```    MYSQL_PORT=3303 ```
```    MYSQL_ROOT_PASSWORD=root ```
```    MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d ```
### Bước 5
``` Run: docker-compose up -d --build nginx mysql ```
### Bước 6
``` Out khỏi thư mục laradock (cd ..) gõ cp .env.example .env, gõ tiếp composer install  ````
### Bước 7
``` Gõ ifconfig tìm ip của máy VD:192.168.16.1 và edit file .env của như sau: ```
``` DB_CONNECTION=mysql ```
``` DB_HOST=192.168.16.1 ```
``` DB_PORT=3303 ```
``` DB_DATABASE=citizens ```
``` DB_USERNAME=root ```
``` DB_PASSWORD=root ```
### Bươc 8
``` Vào lại thư mục laradock (cd laradock) gõ docker-compose exec workspace bash, rồi gõ tiếp php artisan migrate````
``` php artisan db:seed ```
### Bước 9
``` out ra khỏi thưc mục laradock gõ php artisan key:generate ```
