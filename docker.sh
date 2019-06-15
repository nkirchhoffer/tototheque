#!/bin/bash

echo "$DOCKER_PASSWORD" | docker login --username "$DOCKER_USERNAME" --password-stdin
docker build -t ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT} .
docker push ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT}
docker tag ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT} ${DOCKER_REPOSITORY}
docker push ${DOCKER_REPOSITORY}
