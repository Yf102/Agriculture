#!/bin/bash

if [ ! -d vendor ]; then
    echo "Please exec $0 from source root directory";
    exit;
fi

# agriculture db name
[ -f var/agriculture.db ] && rm var/agriculture.db

# Prepare config file, PHP models, sql db
vendor/bin/propel config:convert
vendor/bin/propel model:build
vendor/bin/propel sql:build

# Create tables and insert init values
vendor/bin/propel sql:insert
vendor/bin/propel sql:insert --platform=sqlite --sql-dir=module/orm/sql/sqlite/
