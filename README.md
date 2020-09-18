# Slim Framework Skeleton for Docker

a starting point for new [Slim Framework](http://www.slimframework.com) projects.

## Requirements

- [Docker Engine](https://docs.docker.com/engine/installation/) and
  [Docker Compose](https://docs.docker.com/compose/)
- [Composer](https://getcomposer.org/) installed in your global path

## Installation

The actual Slim Framework application will be located in `Parent-project/web`.
my code will be located in `Parent-project/web/src`.

Then, start up the dockerized application:

```bash
$ cd Parent-project/web
$ docker-compose up
```

## For test from  browser 

- Get all users : http://localhost:8080/api/v1/users
- Filter by currncy  : http://localhost:8080/api/v1/users?currency=AED
- Filter by Balance : http://localhost:8080/api/v1/users?balanceMin=300&balanceMax=580.8
- Filter by provider : http://localhost:8080/api/v1/users?provider=DataProviderX
- Filter by userid : http://localhost:8080/api/v1/users?id=d3d29d70-1d25-11e3-8591-034165a3a613
- Filter by statusCode  : http://localhost:8080/api/v1/users?statusCode=decline
- Filter By All : http://localhost:8080/api/v1/users?balanceMin=300&balanceMax=580.8&currency=AED&statusCode=decline&provider=DataProviderY

## For Run the unittesting from 
```bash
$ cd Parent-project/web
$ run composer test
```

## You can add New provider in 3 steps
- Add provider json file  under web/providersJsonFiles/
- Create provider class under web/Infrastructure/ProvidersMapper/ , this class includes the provider configuration
- Create new object from the provider and using it in  web/src/Infrastructure/Persistence/User/InMemoryUserRepository.php

## For any Questions call me on 201006989455 or send me on hema3rafa@gmail.com



