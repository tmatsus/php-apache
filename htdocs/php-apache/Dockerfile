FROM php:7.2-apache
RUN docker-php-ext-install pdo_mysql
COPY htdocs/ /var/www/html/
EXPOSE 80
