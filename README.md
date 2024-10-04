## Table of Contents
- [Table of Contents](#table-of-contents)
- [General Info](#general-info)
- [Technologies](#technologies)
- [Installation](#installation)
    - [Pre-requisites](#pre-requisites)
    - [Steps](#steps)
- [Maintainer](#maintainer)

## General Info
This is a technical test software designed to evaluate my skills as a senior developer.

## Technologies
A list of technologies used within the project:
* [Laravel](https://laravel.com): Version 11
* [Composer](https://getcomposer.org): Version 2.8.0
* [Nginx](https://www.nginx.com): Version 1.24.0
* [PHP](https://www.php.net): Version 8.3
* [Docker](https://www.docker.com): Version 24.0.6
* [Docker Compose](https://docs.docker.com/compose/): v2.21.0-desktop.1

## Installation
Step by step instructions on how to run this application.

### Pre-requisites
***
- Docker
- Docker Compose
- Linux Operating System (or Windows with WSL 2 and Ubuntu)
- Git

### Steps
***
```bash
$ git clone https://github.com/JhonPiraquive/laravel-technical-test.git
$ cd laravel-technical-test
```
Add your custom values to ROOT_PASSWORD, USERNAME, and PASSWORD variables
```bash
$ ROOT_PASSWORD= USERNAME= PASSWORD= docker-compose -p app_database -f db-docker-compose.yml up -d --build --remove-orphans
$ docker-compose -p app_server up -d --build --remove-orphans
$ Wait a couple of seconds and go to http://localhost
```

# Maintainer
Jhon Alejandro Piraquive Ramirez
