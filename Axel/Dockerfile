FROM debian:buster
LABEL maintainer="acharlas@student.42.fr"
RUN [ "/bin/bash", "-c", "apt update ; apt -y install {nginx,mariadb-server,php-{fpm,mysql,mbstring,zip,gd,xml,pear,gettext,cgi}}" ]
RUN mkdir -p /var/www/localhost
RUN mkdir -p /var/www/localhost/phpmyadmin
ADD https://wordpress.org/latest.tar.gz /var/www/localhost
ADD https://files.phpmyadmin.net/phpMyAdmin/4.9.4/phpMyAdmin-4.9.4-english.tar.gz /var/www/localhost/phpmyadmin

RUN tar xzf /var/www/localhost/phpmyadmin/phpMyAdmin-4.9.4-english.tar.gz --strip-components=1 -C /var/www/localhost/phpmyadmin ; rm /var/www/localhost/phpmyadmin/phpMyAdmin-4.9.4-english.tar.gz 
RUN tar xzf /var/www/localhost/latest.tar.gz -C /var/www/localhost/ ; rm var/www/localhost/latest.tar.gz

COPY config.inc.php /var/www/localhost/phpmyadmin/config.sample.inc.php
COPY wp-config.php /var/www/localhost/wordpress/wp-config-sample.php
COPY localhost /etc/nginx/sites-available/default
#RUN ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/

#COPY sql_start.sh /

RUN ["/bin/bash", "-c", "service mysql start && mysql -u root -e \"CREATE DATABASE wordpress\" && mysql -u root -e \"GRANT ALL ON wordpress.* TO 'wordpress_user'@'localhost' IDENTIFIED BY 'password'\" && mysql -u root -e \"FLUSH PRIVILEGES\"" ]
