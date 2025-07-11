FROM php:8.2-apache

# Cài đặt extension mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Cài đặt redis cho php
RUN pecl install redis \
    && docker-php-ext-enable redis

# Bật mod_rewrite để Apache hỗ trợ RewriteEngine
RUN a2enmod rewrite

# Bật mod_rewrite và mod_headers để Apache hỗ trợ .htaccess
RUN a2enmod rewrite headers

# Chỉnh sửa file cấu hình Apache để AllowOverride All
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
