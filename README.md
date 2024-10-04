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

- Laravel Breeze is used for auth.
- Default user is test@example.com and password is 12345678

## Technologies
A list of technologies used within the project:
* [Laravel](https://laravel.com): Version 11
* [Composer](https://getcomposer.org): Version 2.8.0
* [Nginx](https://www.nginx.com): Version 1.24.0
* [PHP](https://www.php.net): Version 8.3
* [Docker](https://www.docker.com): Version 24.0.6
* [Docker Compose](https://docs.docker.com/compose/): Version 2.21.0-desktop.1
* [Node JS](https://nodejs.org/en): Version 20.17.0
* [npm](https://docs.npmjs.com/cli/v10/commands/npm-install): Version 10.8.2

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

<p>
    Add your custom values to ROOT_PASSWORD, USERNAME, and PASSWORD variables
</p>

```bash
$ ROOT_PASSWORD= USERNAME= PASSWORD= docker-compose -p app_database -f db-docker-compose.yml up -d --build --remove-orphans
$ cp .env.example .env
```

<p>
    Replace the following variables in the .env file
</p>

```
    DB_DATABASE=The database name you set
    DB_USERNAME=The database username you set
    DB_PASSWORD=The password you set
```

<p>
    Also if you want to receive emails configure the following variables (Make sure you have a mailersend account) By default the emails are stored in the laravel.log file, if mailersend is a free trial it will take some time so feel free to use the laravel.log file
</p>

[Create a Mailersend account](https://www.mailersend.com/)

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailersend.net
MAIL_PORT=587
MAIL_USERNAME=your smtp username from mailersend
MAIL_PASSWORD=your smtp password from mailersend
MAIL_ENCRYPTION="tls"
MAIL_FROM_ADDRESS="info@yourtrialdomain"
MAIL_FROM_NAME="${APP_NAME}"
```

```bash
$ docker-compose -p app_server up -d --build --remove-orphans
$ Wait a couple of seconds and go to http://localhost
```

# Considerations

You can execute the tests with

```bash
$ php artisan test
```

# Maintainer
Jhon Alejandro Piraquive Ramirez
