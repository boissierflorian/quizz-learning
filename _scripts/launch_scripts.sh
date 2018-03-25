#!/usr/bin/env bash

scripts=('_scripts/base.sql', '_ap/third_party/ion_auth/sql/ion_auth.sql')

if [ $# -lt 2 ]; then
    echo "usage: <user> <password>";
    exit;
fi

user=$1;
password=$2;

#touch "_scripts/log.txt"

mysql -u $user --password="$2" --execute="source _scripts/database.sql";
mysql -u $user --password="$2" --execute="use quizz_learning; source _ap/third_party/ion_auth/sql/ion_auth.sql;"
mysql -u $user --password="$2" --execute="source _scripts/base.sql";