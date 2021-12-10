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
| Apache/PHP    | ``./www``     | [http://localhost:9050/](http://localhost:9050/)           |
| MySql         | ``./mysql``   | [http://localhost:9060/](http://localhost:9060/) |
| phpMyAdmin    | none          | [http://localhost:9070/](http://localhost:9070/) |
| MailHog       | none          | [http://localhost:9080/](http://localhost:9080/) |