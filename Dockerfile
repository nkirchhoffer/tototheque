FROM busybox

RUN mkdir /code

COPY . /code

CMD ["/bin/sh", "-ec", "while :; do echo '.'; sleep 5 ; done"]