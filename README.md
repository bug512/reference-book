# Reference book

## Overview
Docker Compose configuration to run PHP 7.4 with Laravel 8, Mysql, Memcached, Redis and Nuxt JS.

## Install prerequisites

For now the project has been tested on Linux only.

You will need:

* [Docker CE](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install)
* Git (optional)

## How to use it

### Installation

Run the command:

```
sh install.sh
```

Wait until the project is installed and run the command:

```
sh database.sh
```

If the migration fails, wait a little time and run the command again.

### Work with project

For start run the command:

```
sh start.sh
```

For stop run the command:

```
sh stop.sh
```

Main page by URL: http://localhost:3001

API endpoints has base URL: http://localhost:3002/api

Default account:
Email: admin@localhost.loc
Password: password

### Uninstallation

Run the command:

```
sh uninstall.sh
```


