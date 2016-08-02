FROM richarvey/nginx-php-fpm

MAINTAINER Connor Jones <nullbones4@gmail.com>

# https://github.com/fgrehm/docker-phantomjs2/blob/master/Dockerfile
COPY dockerized-phantomjs.tbz /root/
RUN \
    cd / && \
    tar xf /root/dockerized-phantomjs.tbz

RUN apk update && \
    apk add mariadb && \
    apk add mariadb-client && \
    apk add mariadb-dev && \
    apk add py-pip && \
    apk add curl

RUN pip install selenium

RUN echo "[include]" >> /etc/supervisord.conf && \
    echo "files = /etc/supervisor/conf.d/*.conf" >> /etc/supervisord.conf

COPY mysql.conf /etc/supervisor/conf.d/
COPY messages.conf /etc/supervisor/conf.d/

COPY dbinit.sql /root/
RUN \
    mysql_install_db --user=mysql && \
    /bin/bash -c "usr/bin/mysqld_safe &" && \
    sleep 5 && \
    mysql -u root < /root/dbinit.sql

COPY messages.py /root/

# setup nginx
RUN \
    sed -i 's/root \/usr\/share\/nginx\/html/root \/var\/www\/html/g' /etc/nginx/sites-enabled/default.conf && \
    sed -i 's/pdo_mysql.default_socket=/pdo_mysql.default_socket=\/run\/mysqld\/mysqld.sock/' /etc/php5/conf.d/php.ini && \
    rm /var/www/html/*

COPY web /var/www/html

