#!/bin/bash

# 导入 .env  环境变量
source ./.env

mysql -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE < database/admin.sql
