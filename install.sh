#!/usr/bin/env bash

cd backend && \
 ./vendor/bin/sail build && \
 ./vendor/bin/sail up -d && \
 ./vendor/bin/sail composer install --no-interaction --prefer-dist --optimize-autoloader

cd ../frontend && docker-compose up -d

echo "\nDone\n"