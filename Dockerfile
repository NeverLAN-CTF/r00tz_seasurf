FROM richarvey/nginx-php-fpm

MAINTAINER Connor Jones <nullbones4@gmail.com>

# setup nginx
RUN sed -i 's/root \/usr\/share\/nginx\/html/root \/var\/www\/html/g' /etc/nginx/sites-enabled/default.conf 
RUN rm /var/www/html/*

COPY web /var/www/html
