FROM mattrayner/lamp:latest-1604

COPY config/mail.ini /etc/php/5.6/apache2/conf.d
COPY config/php.ini /etc/php/5.6/apache2
COPY config/ssmtp.conf /etc/ssmtp

EXPOSE 80
EXPOSE 3306
