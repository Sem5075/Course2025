#!/bin/bash

echo "=== Запуск полного бэкапа всех серверов ==="
"./backup_web1.sh"
"./backup_web2.sh"
"./backup_monitoring.sh"

echo "=== Все бэкапы завершены! ==="
