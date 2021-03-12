#!/usr/bin/env bash

cd backend && ./vendor/bin/sail down -v --rmi local --remove-orphans

cd ../frontend && docker-compose down -v --rmi local --remove-orphans

echo "\nDone\n"