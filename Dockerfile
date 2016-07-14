FROM richarvey/nginx-php-fpm

MAINTAINER Connor Jones <nullbones4@gmail.com>
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get -y upgrade && \
    apt-get -y install mysql-server && \
    apt-get -y install libmysqlclient-dev

COPY dbinit.sql /root/
RUN \
    /bin/bash -c "usr/bin/mysqld_safe &" && \
    sleep 5 && \
    mysql -u root < /root/dbinit.sql

RUN echo "[include]" >> /etc/supervisord.conf && \
    echo "files = /etc/supervisor/conf.d/*.conf" >> /etc/supervisord.conf

COPY mysql.conf /etc/supervisor/conf.d/

# setup nginx
RUN sed -i 's/root \/usr\/share\/nginx\/html/root \/var\/www\/html/g' /etc/nginx/sites-enabled/default.conf 
RUN rm /var/www/html/*

COPY web /var/www/html

RUN rm -rf /var/lib/apt/lists/*
