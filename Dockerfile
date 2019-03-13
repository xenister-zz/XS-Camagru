FROM mattrayner/lamp:latest-1604

RUN apt-get install ssmtp -y
COPY config/mail.ini /etc/php/5.6/apache2/conf.d
COPY config/php.ini /etc/php/5.6/apache2
COPY config/ssmtp.conf /etc/ssmtp
COPY config/bdd.sql /bdd.sql
COPY config/setup.php /setup.php
COPY config/database.php /database.php
COPY config/create_mysql_users.sh /create_mysql_users.sh
RUN chmod 755 /*.sh

CMD ["/run.sh"]
