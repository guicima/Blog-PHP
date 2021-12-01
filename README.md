# Blog-PHP
A PHP blog project for school purposes
## Set up the environnement
**Install dependencies**

Install Docker
[Get Docker](https://docs.docker.com/get-docker/)

**Start the project**
```sh
docker-compose up
```
or 
```sh
docker-compose up -d
```
to run in detached mode

**Access the project**

| Container     | Folder        | Address                                          |
| ------------- | ------------- |:------------------------------------------------:|
| Apache/PHP    | ``./www``     | [http://localhost/](http://localhost/)           |
| MySql         | ``./mysql``   | [http://localhost:3306/](http://localhost:3306/) |
| phpMyAdmin    | none          | [http://localhost:8080/](http://localhost:8080/) |
| MailHog       | none          | [http://localhost:8025/](http://localhost:8025/) |