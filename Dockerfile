FROM ubuntu:20.04

ARG PHP_VERSION=8.1

ARG DEBIAN_FRONTEND=noninteractive

COPY ./docker-conf/scripts/autoclean.sh /root/
COPY ./docker-conf/scripts/docker-entrypoint.sh /

RUN echo $PHP_VERSION > /PHP_VERSION; \
chmod +x /root/autoclean.sh; \
chmod +x /docker-entrypoint.sh; \
mkdir /app; \
mkdir /run/php/; \
mkdir -p /app/public; \
apt-get update;

RUN apt-get install -y software-properties-common apt-transport-https \
cron vim wget unzip curl less git nginx; \
/usr/bin/unattended-upgrades -v;

#php-base
RUN add-apt-repository -y ppa:ondrej/php; \
export DEBIAN_FRONTEND=noninteractive; \
apt-get install -yq php$PHP_VERSION php$PHP_VERSION-cli \
php$PHP_VERSION-common php$PHP_VERSION-curl php$PHP_VERSION-fpm php-json \
php$PHP_VERSION-mysql php$PHP_VERSION-opcache php$PHP_VERSION-readline \
php$PHP_VERSION-xml php$PHP_VERSION-xsl php$PHP_VERSION-gd php$PHP_VERSION-intl \
php$PHP_VERSION-bz2 php$PHP_VERSION-bcmath php$PHP_VERSION-imap php$PHP_VERSION-gd \
php$PHP_VERSION-mbstring php$PHP_VERSION-pgsql php$PHP_VERSION-sqlite3 \
php$PHP_VERSION-xmlrpc php$PHP_VERSION-zip php$PHP_VERSION-odbc php$PHP_VERSION-snmp \
php$PHP_VERSION-interbase php$PHP_VERSION-ldap php$PHP_VERSION-tidy \
php$PHP_VERSION-memcached php-tcpdf php-redis php-imagick php-mongodb php-pear php-dev;

#php-swoole
RUN git clone https://github.com/swoole/swoole-src.git && \
cd swoole-src &&\
phpize && \
./configure && \
make && make install

#sphinxsearch
RUN apt-get install -y sphinxsearch;

#config base

COPY ./docker-conf/php/php-fpm.ini /etc/php/$PHP_VERSION/fpm/php.ini
COPY ./docker-conf/php/php-cli.ini /etc/php/$PHP_VERSION/cli/php.ini
COPY ./docker-conf/nginx/default /etc/nginx/sites-available/default
COPY ./docker-conf/sphinxsearch/sphinx.conf /etc/sphinxsearch/sphinx.conf
COPY ./docker-conf/sphinxsearch/sphinxsearch /etc/default/sphinxsearch
COPY ./docker-conf/sphinxsearch/stop_words_es.txt /etc/sphinxsearch/data/stop_words_es.txt
COPY . /app/

RUN /app/php artisan octane:install

EXPOSE 80 443

ENTRYPOINT ["/docker-entrypoint.sh"]