FROM php:5.6-apache
FROM httpd:2.4
COPY . /usr/local/apache2/htdocs/
