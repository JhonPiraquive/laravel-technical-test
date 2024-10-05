# Laravel Technical Test

## Description
This is a technical test software designed to evaluate my skills as a senior developer.

## Prerequisites
- [Docker](https://www.docker.com/get-started) installed on your machine.
- [Docker Compose](https://docs.docker.com/compose/install/) installed on your machine.
- [Linux or WSL](https://learn.microsoft.com/en-us/windows/wsl/install) installed on your machine.
- [Git](https://git-scm.com/) installed on your machine.

## Getting Started

### Cloning the Repository, Initializing Docker Containers, and Setup (Step by Step)

To clone the repository, run the following command in your terminal:

```bash
$ git clone https://github.com/JhonPiraquive/laravel-technical-test.git
```

Navigate to the project directory and run the following command to build and start the Docker containers:

```bash
$ cd laravel-technical-test
```

Add your custom values to ROOT_PASSWORD, USERNAME, and PASSWORD variables (This will construct the database container)
```
$ ROOT_PASSWORD= USERNAME= PASSWORD= docker-compose -p app_database -f db-docker-compose.yml up -d --build --remove-orphans
```

Create the .env file
```
$ cp .env.example .env
```

Replace the following variables in the .env file
```
DB_DATABASE=The database name you set
DB_USERNAME=The database username you set
DB_PASSWORD=The password you set
```

If you want to receive emails configure the following variables (Make sure you have a mailersend account) By default the emails are stored in the laravel.log file, if mailersend is a free trial it will take some time so feel free to use the laravel.log file [Create a Mailersend account](https://www.mailersend.com)
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

This will construct the nginx and php container
```
docker-compose -p app_server up -d --build --remove-orphans
```

Wait a couple of seconds and go to http://localhost

### Executing Migrations and Seeders
The containers will create this for you, just relax and wait! 😀

### Accessing the Database
To access the database, you can use a database management tool phpMyAdmin through http://localhost:8080

### Running Tests

You can execute the unit tests using the following commands:

```bash
$ docker exec -it app_php bash
$ php artisan config:cache
$ composer dump-autoload
$ php artisan test
```

## License

MIT License

Copyright (c) 2024 Alejandro Piraquive

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

- The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## Contributing
Provide guidelines for contributing to your project.

## Contact
For any questions or suggestions, feel free to contact:

Alejandro Piraquive alejandro5.6@icloud.com
