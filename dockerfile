FROM elrincondeisma/php-for-laravel:8.3.7

WORKDIR /app
COPY . .

# RUN rm -rf /app/public/storage
# RUN ln -s /app/storage/app/public /app/public/storage

RUN composer install --no-dev --optimize-autoloader
RUN composer require laravel/octane

RUN mkdir -p /app/storage/logs

RUN php artisan octane:install --server="swoole"

# CMD php artisan octane:start --server="swoole" --host="0.0.0.0"
EXPOSE 8000

ENTRYPOINT ["php","artisan","octane:start","--server=swoole","--host=0.0.0.0"]
