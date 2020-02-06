service mysql start
echo "CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;" | mysql -u root -p
echo "GRANT ALL ON wordpress.* TO 'wordpress_user'@'localhost' IDENTIFIED BY 'password';" | mysql -u -root
echo "FLUSH PRIVILEGES;" | mysql -u root

service nginx start
service php7.3-fmp start
service mysql restart
