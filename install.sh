#!/usr/bin/env bash

cd backend && \
 ./vendor/bin/sail up -d

cd ../frontend && docker-compose up -d

echo "\nDone\n"