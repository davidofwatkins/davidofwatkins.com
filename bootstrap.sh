#!/usr/bin/env bash

apt-get update

# Apache
apt-get install -y apache2
rm -rf /var/www
ln -fs /vagrant /var/www

# MySQL
echo 'mysql-server-5.1 mysql-server/root_password password vagrant' | debconf-set-selections
echo 'mysql-server-5.1 mysql-server/root_password_again password vagrant' | debconf-set-selections
apt-get -y install mysql-server

# PHP
sudo apt-get install -y php5 libapache2-mod-php5 php5-mysql
sudo /etc/init.d/apache2 restart

# Sendmail
# Note: this does not work out of the box. Probably not necessary to send
# email from dev VM anyway.
sudo apt-get -y install sendmail