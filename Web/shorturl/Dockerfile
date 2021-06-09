FROM prexdocker/php73_mailcatcher:1.0.0

LABEL Author="lastsward<newsctf-qq_group_1063624041>"

COPY src/ /var/www/html/
COPY php.ini /usr/local/etc/php/
COPY readflag /
RUN chmod -R 777 /var/www/html

EXPOSE 22223