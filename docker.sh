#!/bin/bash

echo "${DOCKER_PASSWORD}" | docker login -u "${DOCKER_USERNAME}" --password-stdin
docker build -t ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT} .
docker push ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT}
docker tag -f ${DOCKER_REPOSITORY}:${TRAVIS_COMMIT} ${DOCKER_REPOSITORY}
docker push ${DOCKER_REPOSITORY}
