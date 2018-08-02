#!/bin/bash

####################################
# Docker
###################################
export DOCKER_CLIENT_TIMEOUT=120
export COMPOSE_HTTP_TIMEOUT=120
sudo docker-compose build --no-cache
sudo docker-compose up