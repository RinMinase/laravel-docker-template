<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Introduction / Motivation of this project
I'm sick of other extremely complicated and lengthy guides and tutorials on how to create a Dockerized Laravel (see [here](https://www.cloudsigma.com/deploying-laravel-nginx-and-mysql-with-docker-compose/), [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04), [here](https://blog.logrocket.com/how-to-run-laravel-docker-compose-ubuntu-v22-04/) and [here](https://www.twilio.com/blog/get-started-docker-laravel)), so I created one myself. Using this is as simple as cloning or downloading the whole template then running `docker-compose up -d`, setup can be finished in more-or-less 5-10 minutes.

## Using the template

### Using Git template
1. Click `Use this template` then `Create a new repository`
2. Clone your newly created repository
3. Copy the env file by running `cp .env.example .env`
4. Create and run the docker containers by `docker-compose up -d`
5. Navigate in the created container `docker exec -it php sh`
6. Run the commands below to start your Laravel application
  ```
  composer install
  php artisan key:generate
  php artisan migrate:fresh --seed
  ```

### Using Git clone
1. Clone the repository by running `git clone git@github.com:RinMinase/laravel-docker-template.git`
2. Remove instances of the original repository on your project
  - Open your terminal and run these commands below:
    - `git remote remove origin`
    - `rm -rf .git/`
    - `git init`
3. Copy the env file by running `cp .env.example .env`
4. Create and run the docker containers by `docker-compose up -d`
5. Navigate in the created container `docker exec -it php sh`
6. Run the commands below to start your Laravel application
  ```
  composer install
  php artisan key:generate
  php artisan migrate:fresh --seed
  ```

### Downloading the repository
1. Download the repository as a zip file
2. Copy the env file by running `cp .env.example .env`
3. Create and run the docker containers by `docker-compose up -d`
5. Navigate in the created container `docker exec -it php sh`
6. Run the commands below to start your Laravel application
  ```
  composer install
  php artisan key:generate
  php artisan migrate:fresh --seed
  ```

## Default Values

This project contains 3 docker containers, all of which uses the official docker images in Alpine linux
- `php` (which houses your source code)
  - container name: `php`
- `nginx` (which houses the webserver that runs your code in a browser)
  - container name: `webserver`
- `db` (which contains the database of your project)
  - container name: `database`
  - by default this uses [PostgreSQL](https://www.postgresql.org/), but feel free to change it to your desired database

The database by default uses these default parameters to let you get started without even touching any configuration settings
- `DB_DATABASE` or your default database name: `laravel`
- `DB_USERNAME` or your default database username: `postgres`
- `DB_PASSWORD` or your default database password: `postgres`

## FAQ

### How to update PHP / nginx / PostgreSQL?

- Updating `PHP`
  - Modify the version text under `docker-compose.yml` under `services : php : build : args`, `PHP_VERSION`
  - Example here: https://github.com/RinMinase/laravel-docker-template/blob/258923b0dc2e5fef9f6337954fcebafb59661d2c/docker-compose.yml#L15
  - You can find the php versions possible [here](https://hub.docker.com/_/php/tags?page=1&name=fpm-alpine)
- Updating `nginx`
  - Modify the version text under `docker-compose.yml` under `services : nginx : build : args`, `NGINX_VERSION`
  - Example here: https://github.com/RinMinase/laravel-docker-template/blob/258923b0dc2e5fef9f6337954fcebafb59661d2c/docker-compose.yml#L30
  - You can find the nginx versions possible [here](https://hub.docker.com/_/nginx/tags?page=1&name=-alpine)
- Updating `db`
  - Modify the version text under `docker-compose.yml` under `services : db : image`, and change the version of the image name
  - Example here: https://github.com/RinMinase/laravel-docker-template/blob/258923b0dc2e5fef9f6337954fcebafb59661d2c/docker-compose.yml#L48
  - You can find the postgres versions possible [here](https://hub.docker.com/_/postgres/tags?page=1&name=-alpine)

### Why use official images?

Other tutorials or guides uses customized images (see [here for the guide](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04) -- actual [line of code](https://github.com/do-community/travellist-laravel-demo/blob/cb9abd07cb6e8fb46d12c0f9cd650f3a6b976307/docker-compose.yml#L10)), these images are so hard to update manually compared to just editing a value then rebuilding the whole container again, see the question above on how to update each docker container.

### Why use alpine linux?

  Alpine linux is very lightweight and secure enough. Since the image used is lightweight, you can quickly download it compared to fully-fledged linux distros such as Ubuntu. (Some references for these: [here](https://nickjanetakis.com/blog/the-3-biggest-wins-when-using-alpine-as-a-base-docker-image) and [here](https://sysdig.com/learn-cloud-native/container-security/what-is-docker-alpine/)).

Nonetheless, it also has its downsides, (references [here](https://dev.to/kakisoft/dockeralpine-why-you-should-avoid-alpine-linux-44he) and [here](https://www.linkedin.com/pulse/musl-libc-alpines-greatest-weakness-rogan-lynch)) I've even encountered a few of them, these are:
- using other package managers aside from `apk`
- some libraries which you may possibly use are not present such as `glibc` since alpine uses `musl-libc` and requires a [sad and annoying workaround](https://stackoverflow.com/a/37835009) for it to work

### Why use static versions for docker containers?

Why not? A variable version might mean that it works on my machine but not on yours because yours has a different (possibly newer) version than mine (references [here](https://nickjanetakis.com/blog/docker-tip-18-please-pin-your-docker-image-versions) and [here](https://docs.gradle.org/current/userguide/dependency_locking.html)).
