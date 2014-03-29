#! /bin/sh -

cat reset_table*.sql  > reset_all_tables.sql
echo "show warnings;" >> reset_all_tables.sql

cat testdata_*.sql    > all_testdata.sql
echo "show warnings"  >> all_testdata.sql
