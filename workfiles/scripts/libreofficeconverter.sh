#!/bin/bash

if [ -z "$1" ]; then
    echo "Must pass source file to convert to pdf";
    exit 10;
fi

# This assumes your unoconv executable is located at /usr/bin/unoconv
# If that's not true try a `which unoconv` to get the path and update 
# the path below to your path

/usr/bin/unoconv -f $3 --output $1 $2
chown www-data $1
chgrp www-data $1
