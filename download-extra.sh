#!/bin/bash
curl -LO https://github.com/DarriusAlexander/speaklight-content/archive/master.zip  | grep -oP '"tag_name": "\K(.*)(?=")'
unzip master.zip -d /wordpress
mv /wordpress/wp-content-master /wordpress/wp-content