FROM php:5.3.29-apache
RUN mkdir /var/log/php/
RUN chown www-data:www-data /var/log/php/