FROM php:7.2.8-apache
RUN docker-php-ext-install pdo_mysql
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf
RUN a2enconf fqdn
CMD sed -i -e "s/Listen 80/Listen $PORT/g" /usr/local/apache2/conf/httpd.conf && httpd-foreground
COPY htdocs/ /var/www/html/
EXPOSE 80
