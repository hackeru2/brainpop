# BrainPOP Backend Developer Exam - Laravel

This project was Created with the [Infyom](https://www.infyom.com/open-source) laravel code generator.

This is a working REST API for accessing and manipulating school
entities, using the Laravel PHP framework, that includes :

  - Web Admin Panel
  - API Endpoints
  - Testing



### Plugins

Dillinger is currently extended with the following plugins. Instructions on how to use them in your own application are linked below.

| Plugin | README |
| ------ | ------ |
| Laravel | [plugins/dropbox/README.md][PlDb] |
| Infoym | [plugins/github/README.md][PlGh] |
| JWT | [plugins/googledrive/README.md][PlGd] |
 



## Installation

Use the package manager [composer](https://pip.pypa.io/en/stable/) to install this laravel project.

```bash 
cd my-folder 
composer install
```
Set the .env file (example):

```sh
DB_DATABASE=booster
DB_USERNAME=root
DB_PASSWORD=
JWT_SECRET=6jI9BYua101WQ2zPMF00fquvPuOnfb53gJm3w8D4sUsO4rXUP19lUizr9lpg7jYN
```
## Usage

```php
cd my-folder
php artisan migrate --seed
php artisan serve
```



#### WEB

> Login with browser

> | GET| http://[your_localhost_route]|
>| ------ | ------ |


> login with credentials : @email: brainpop123@gmail.com  , password:password
#### API
> Login Teacher/Student

> **Example** :

> | POST| http://[your_localhost_route] /api/login-members?email=kjassy@gmail.com&password=Aa!123456|
>| ------ | ------ |

> **Use Token reposnse to send Request to oher routes** :
> | PUT| http://[your_localhost_route] /api/periods/1?token=[token]
>| ------ | ------ |
> **No Need for token when Creating new rows** :
> | POST| http://[your_localhost_route]/api/periods
>| ------ | ------ |
>#### Request Params Periods create/update :
>```json
>{
> "name" :"534342-period" ,
> "teacher_id" : 2 , 
> "full_name" : "halulu",
>  "grade" : 3,
>  "students" : "1,3,4"
>  }
>```

>### More Examples
>#### Fetch all students in a given period:
>| GET|http://[your_localhost_route]/api/periods/{periods_id}/students?token=[your_token eyJ0e..]
>| ------ | ------ |
>#### Fetch all periods associated with a given teacher:
>| GET|http://[your_localhost_route]/api/teachers/{teacher_id}/periods?token=[your_token eyJ0e..]
>| ------ | ------ |
>#### Fetch all students that are linked to a teacher via period:
>| GET|http://[your_localhost_route]/api/teachers/{teacher_id}/students?token=[your_token eyJ0e..]
>| ------ | ------ |
>
>**Full route list can be viewed in the api.php or web.php  file  or by typing :**
>```sh
>cd my-folder
>php artisan route:list
>```
## Testing
Crud tests for Period, Student and Teacher (No middlewares).

```sh
cd my-folder
php artisan test
```

 