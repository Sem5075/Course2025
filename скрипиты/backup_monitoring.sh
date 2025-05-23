#!/bin/bash

SOURCE_USER="sem"
SOURCE_HOST="192.168.1.204"
SOURCE_DIR="/var/www"
BACKUP_DIR="./backups/monitoring"

MYSQL_USER="####"       
MYSQL_PASS="####"  
MYSQL_DATABASES=("zabbix") 

	mkdir -p "$BACKUP_DIR/mysql"

	echo "--- Начало бэкапа MySQL $(date) ---" 
		    mysqldump  -h"$SOURCE_HOST" -u"$MYSQL_USER" -p"$MYSQL_PASS" "zabbix" > "$BACKUP_DIR/mysql/$DB-$(date +%Y-%m-%d).sql"
		        gzip "$BACKUP_DIR/mysql/$DB-$(date +%Y-%m-%d).sql"
		echo "--- Бэкап MySQL завершен $(date) ---" 

		echo "--- Начало rsync $(date) ---"
		rsync -avz --delete  "$SOURCE_USER@$SOURCE_HOST:$SOURCE_DIR" "$BACKUP_DIR/files" 1>"/dev/null"
		echo "--- Rsync завершен $(date) ---"
