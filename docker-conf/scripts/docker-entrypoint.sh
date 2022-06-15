#!/bin/bash

# CLEAR TMP FILES
/root/autoclean.sh

# START SERVICES
/etc/init.d/nginx restart


# START sphinx
indexer --all --rotate
searchd


