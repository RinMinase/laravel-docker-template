<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Introduction / Motivation of this project
I'm sick of other extremely complicated and lengthy guides and tutorials on how to create a Dockerized Laravel (see [here](https://www.cloudsigma.com/deploying-laravel-nginx-and-mysql-with-docker-compose/), [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04), [here](https://blog.logrocket.com/how-to-run-laravel-docker-compose-ubuntu-v22-04/) and [here](https://www.twilio.com/blog/get-started-docker-laravel)), so I created one myself. Using this is as simple as cloning or downloading the whole template then running `docker-compose up -d`, setup can be finished in more-or-less 5-10 minutes.

## Using the template

### Using Git template
1. Click `Use this template` then `Create a new repository`
2. Clone your newly created repository
3. Copy the env file by running `cp .env.example .env`
4. Create and run the docker containers by `docker-compose up -d`

### Using Git clone
1. Clone the repository by running `git clone git@github.com:RinMinase/laravel-docker-template.git`
2. Remove instances of the original repository on your project
  - Open your terminal and run these commands below:
    - `git remote remove origin`
    - `rm -rf .git/`
    - `git init`
3. Copy the env file by running `cp .env.example .env`
4. Create and run the docker containers by `docker-compose up -d`

### Downloading the repository
1. Download the repository as a zip file
2. Copy the env file by running `cp .env.example .env`
3. Create and run the docker containers by `docker-compose up -d`

## Default Values
This project contains 3 docker containers
- php (which houses your source code)
  - container name: `php`
- nginx (which houses the webserver that runs your code in a browser)
  - container name: `webserver`
- db (which contains the database of your project)
  - container name: `database`
  - by default this uses [PostgreSQL](https://www.postgresql.org/), but feel free to change it to your desired database

The database by default uses these default parameters to let you get started without even touching any configuration settings
- `DB_DATABASE` or your default database name: `laravel`
- `DB_USERNAME` or your default database username: `postgres`
- `DB_PASSWORD` or your default database password: `postgres`
