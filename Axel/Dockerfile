FROM debian:buster
LABEL maintainer="acharlas@student.42.fr"
RUN [ "/bin/bash", "-c", "apt update ; apt -y install {nginx,mariadb-server,php-{fpm,mysql,mbstring,zip,gd,xml,pear,gettext,cgi}}" ]
RUN mkdir -p /var/www/localhost

ADD https://wordpress.org/latest.tar.gz /var/www/localhost
ADD https://files.phpmyadmin.net/phpMyAdmin/4.9.4/phpMyAdmin-4.9.4-english.tar.gz /var/www/localhost

RUN tar xzf /var/www/localhost/phpMyAdmin-4.9.4-english.tar.gz --strip-components=1 -C /var/www/localhost/ ; rm /var/www/localhost/phpMyAdmin-4.9.4-english.tar.gz 
RUN tar xzf /var/www/localhost/latest.tar.gz -C /var/www/localhost/ ; rm var/www/localhost/latest.tar.gz

COPY config.inc.php /var/www/localhost/phpmyadmin/config.inc.php
COPY wp-config.php /var/www/localhost/wordpress/wp-config-sample.php
COPY localhost /etc/nginx/sites-available/localhost

RUN service nginx start
RUN service mysql start
RUN echo "CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;" | mysql -u root -p
RUN echo "GRANT ALL ON wordpress.* TO 'wordpress_user'@'localhost' IDENTIFIED BY 'password';" | mysql -u -root -p
RUN echo "FLUSH PRIVILEGES;" | mysql -u root -p 
