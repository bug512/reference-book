#!/usr/bin/env bash

cd backend && ./vendor/bin/sail stop

cd ../frontend && docker-compose stop

echo "\nDone\n"