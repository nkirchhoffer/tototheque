#!/bin/bash

docker login --username "$DOCKER_USERNAME" --password "$DOCKER_PASSWORD"
docker build -t ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT} .
docker push ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT}
docker tag -f ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT} ${DOCKER_REPOSITORY}
docker push ${DOCKER_REPOSITORY}
