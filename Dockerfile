# https://github.com/docker-library/wordpress/blob/9ee913eea382b5d79f852a2301d4390904d2e4d2/php7.3/apache/Dockerfile
FROM wordpress:5.2.1-php7.3-apache

EXPOSE 8080
# Use the PORT environment variable in Apache configuration files.
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
# wordpress conf
COPY wordpress/wp-config.php /var/www/html/wp-config.php

# download and install cloud_sql_proxy
RUN apt-get update && apt-get -y install net-tools wget && \
    wget https://dl.google.com/cloudsql/cloud_sql_proxy.linux.amd64 -O /usr/local/bin/cloud_sql_proxy && \ 
    chmod +x /usr/local/bin/cloud_sql_proxy
# downloand the Google Cloud Storage plugin for wordpress from wordpress.org	
RUN curl -LO https://storage.googleapis.com/stateless-fullstacknet/plugins.zip  | grep -oP '"tag_name": "\K(.*)(?=")'; \
    unzip plugins.zip -d /var/www/html/wp-content/plugins/; \
    rm plugins.zip;
        
# COPY locally updated plugins & themes to the new image for redployment to Cloud RUN
 COPY /wp-content/plugins/  /var/www/html/wp-content/plugins/
 COPY /wp-content/themes/  /var/www/html/wp-content/themes/
# custom entrypoint
COPY wordpress/cloud-run-entrypoint.sh /usr/local/bin/

ENTRYPOINT ["cloud-run-entrypoint.sh","docker-entrypoint.sh"]
CMD ["apache2-foreground"]
