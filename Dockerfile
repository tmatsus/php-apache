FROM php:7.2.8-apache
RUN docker-php-ext-install pdo_mysql
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf
RUN a2enconf fqdn
COPY htdocs/ /var/www/html/
EXPOSE 80
