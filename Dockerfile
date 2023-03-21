FROM php:8.0-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
EXPOSE 80
CMD [ "php", -S localhost:80]