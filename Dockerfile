FROM php:7.3-fpm

RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev git \
    && pecl install memcached-3.1.5 \
    && docker-php-ext-enable memcached

RUN docker-php-ext-install pdo_mysql mbstring bcmath

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --quiet --install-dir=/usr/bin \
    && php -r "unlink('composer-setup.php');"

RUN curl -sL https://deb.nodesource.com/setup_13.x | bash - \
    && apt-get install -y nodejs

COPY . /code

WORKDIR /code

RUN composer.phar install
RUN npm install
RUN npm run production

CMD ["php artisan migrate && php artisan db:seed && php-fpm"]