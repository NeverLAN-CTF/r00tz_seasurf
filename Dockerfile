FROM richarvey/nginx-php-fpm

MAINTAINER Connor Jones <nullbones4@gmail.com>

RUN apk update && \
    apk add mariadb && \
    apk add mariadb-client && \
    apk add mariadb-dev

COPY dbinit.sql /root/
RUN \
    mysql_install_db --user=mysql && \
    /bin/bash -c "usr/bin/mysqld_safe &" && \
    sleep 5 && \
    mysql -u root < /root/dbinit.sql

RUN echo "[include]" >> /etc/supervisord.conf && \
    echo "files = /etc/supervisor/conf.d/*.conf" >> /etc/supervisord.conf

COPY mysql.conf /etc/supervisor/conf.d/

# setup nginx
RUN \
    sed -i 's/root \/usr\/share\/nginx\/html/root \/var\/www\/html/g' /etc/nginx/sites-enabled/default.conf && \
    sed -i 's/pdo_mysql.default_socket=/pdo_mysql.default_socket=\/run\/mysqld\/mysqld.sock/' /etc/php5/conf.d/php.ini && \
    rm /var/www/html/*

COPY web /var/www/html

RUN rm -rf /var/lib/apt/lists/*
