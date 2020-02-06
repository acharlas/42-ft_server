FROM debian:buster
LABEL maintainer="acharlas@student.42.fr"

RUN [ "/bin/bash", "-c", "apt update ; apt -y install {nginx,mariadb-server,php-{fpm,mysql,mbstring,zip,gd,xml,pear,gettext,cgi}}" ]

RUN mkdir -p /var/www/localhost; mkdir -p /var/www/localhost/phpmyadmin; mkdir -p mkcert

ADD https://wordpress.org/latest.tar.gz /var/www/localhost
ADD https://files.phpmyadmin.net/phpMyAdmin/4.9.4/phpMyAdmin-4.9.4-english.tar.gz /var/www/localhost/phpmyadmin
ADD https://github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64 mkcert/mkcert

RUN [ "/bin/bash", "-c", "cd mkcert && chmod +x mkcert && ./mkcert -install && ./mkcert localhost"]
RUN tar xzf /var/www/localhost/phpmyadmin/phpMyAdmin-4.9.4-english.tar.gz --strip-components=1 -C /var/www/localhost/phpmyadmin ; rm /var/www/localhost/phpmyadmin/phpMyAdmin-4.9.4-english.tar.gz 
RUN tar xzf /var/www/localhost/latest.tar.gz -C /var/www/localhost/ ; rm var/www/localhost/latest.tar.gz

COPY srcs/config.inc.php /var/www/localhost/phpmyadmin/config.inc.php
COPY srcs/wp-config.php /var/www/localhost/wordpress/wp-config.php
COPY srcs/localhost /etc/nginx/sites-available/localhost
COPY srcs/wordpress.sql /

RUN ["/bin/bash", "-c", "service mysql start && mysql -u root -e \"CREATE DATABASE wordpress\" && mysql -u root -e \"GRANT ALL ON wordpress.* TO 'admin'@'localhost' IDENTIFIED BY 'admin'\" && mysql -u root -e \"FLUSH PRIVILEGES\" && mysql wordpress -u root --password=  < /wordpress.sql" ]

RUN ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/ ; rm /var/www/localhost/phpmyadmin/config.sample.inc.php; rm /var/www/localhost/wordpress/wp-config-sample.php; rm /wordpress.sql

ENTRYPOINT service mysql start && service php7.3-fpm start && service nginx start && bash
