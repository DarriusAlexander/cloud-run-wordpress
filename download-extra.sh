#!/bin/bash
curl -LO https://github.com/DarriusAlexander/speaklight-content/archive/master.zip  | grep -oP '"tag_name": "\K(.*)(?=")'
unzip master.zip -d /wordpress
mv /wordpress/wp-content-master /wordpress/wp-content



RUN curl -LO https://github.com/DarriusAlexander/speaklight-content/archive/master.zip  | grep -oP '"tag_name": "\K(.*)(?=")'; \
	unzip master.zip -d /usr/src/wordpress/wp-content; \
	mv /usr/src/wordpress/wp-content-master /usr/src/wordpress; \
	chown -R www-data:www-data wp-content; \
	chmod -R 777 wp-content