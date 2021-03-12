#!/usr/bin/env bash

cd backend && \
./vendor/bin/sail artisan migrate && \
./vendor/bin/sail artisan db:seed
