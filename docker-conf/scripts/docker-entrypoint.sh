#!/bin/bash

# CLEAR TMP FILES
/root/autoclean.sh

# START SERVICES
/etc/init.d/nginx restart
/etc/init.d/php8.1-fpm restart

# START sphinx
indexer --all --rotate
searchd

# START octane swoole
/bin/php /app/artisan octane:start -q

# KEEP CONTAINER ALIVE
/usr/bin/tail -f /var/log/nginx/access.log