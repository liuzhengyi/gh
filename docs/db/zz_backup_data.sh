#! /bin/sh -

BACKUP_FILE='./backup/backup.'`date +%Y%m%d%H%M`'.sql'
mysqldump --skip-extended_insert -u test --password='' -B test  > "$BACKUP_FILE"

STATUS="$?"

if [ "$STATUS" -eq 0 ] ; then
	echo 'backup completed in file: '"$BACKUP_FILE";
else
	echo 'backup failed. mysqldump returns: '"$STATUS";
fi
