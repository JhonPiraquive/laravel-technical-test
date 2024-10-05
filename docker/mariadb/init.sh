#!/bin/bash

# Create databases if they do not exist
mariadb -u root -p"${MYSQL_ROOT_PASSWORD}" -e "CREATE DATABASE IF NOT EXISTS \`laravel\`;"

# Grant privileges to the specified user
mariadb -u root -p"${MYSQL_ROOT_PASSWORD}" -e "GRANT ALL PRIVILEGES ON laravel.* TO '${MYSQL_USER}'@'%';"

# Flush privileges to ensure that the changes take effect
mariadb -u root -p"${MYSQL_ROOT_PASSWORD}" -e "FLUSH PRIVILEGES;"

# Change ownership and permissions for the volume directory
# Assuming the volume directory is /var/lib/mysql
chown -R mysql:mysql /var/lib/mysql
chmod -R 755 /var/lib/mysql
