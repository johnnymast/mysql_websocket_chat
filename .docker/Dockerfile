FROM php:8.0-apache

# Make a mountable directoy inside the machine to our code.
RUN mkdir /app

ARG DEBIAN_FRONTEND=noninteractive

# Setup the webserver configuration
ENV APACHE_DOCUMENT_ROOT /app/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Run apt update and install some dependancies needed for docker-php-ext
RUN apt update && apt install -y apt-utils sendmail mariadb-client pngquant unzip zip libpng-dev libmcrypt-dev git \
  curl libicu-dev libxml2-dev libssl-dev libcurl4 libcurl3-dev libsqlite3-dev libsqlite3-0 libzip-dev libssl-dev \
  default-mysql-client

# Install PHP extensions
#RUN docker-php-ext-install  hash zip dom session opcache
#curl xml intl gd bcmath pdo_sqlite pdo_mysql pdo  mysqli ?
RUN docker-php-ext-install pdo pdo_mysql


# Setting up permissions
RUN chown -R www-data:www-data /app && a2enmod rewrite

# Load the rewrite module for apache
RUN a2enmod rewrite