# Laravel Assignment

The purpose of this assignment is to have a working API in Laravel.

The request is to make a simple Todo manager (only the API, no frontend).

The basic requirements are that a user can make projects and create todo’s in the project. A project can have multiple todo’s, every todo has 1 project and is tied to 1 user.

These are the requirements:
```
Project
	- a project can be created
		- a project has a name
		- a project can have multiple todos
	- a list of projects can be viewed
```
```
Todo
- a todo can be created
- a todo has a description
- a todo can have 2 states - “Todo” and “Done”
- a todo is related to 1 project
- a todo is owned by 1 user
- a todo keeps track of how many times its viewed (simple counter)
- a todo can be marked as done
- a todo can be deleted
- a todo can be viewed
- a list of todos can be viewed
```


The source code can be shared through a github/gitlab link or a zipfile.


# Api documentation
There is an postman collection import it to test the endpoints.

### Docker devbox
The project is build on top of docker devbox so, all you need is to have docker desktop installed on you pc and then you can navigate to root to run: 

docker-compose up -d | For starting the devbox

docker-compose down | To clean up all containers

### Project access

- Project is running on http://localhost:80
- Db client is running on http://localhost:54320

Db creating for project
- go to http://localhost:54320
- set provider Mysql
- set username root
- set password secret
- set server database
- after login create database with name ex2 and ex2_test for testing

### Env setup

- All you need it to copy the .env.example to .env and run the todo manager container to execute
	- php artisan key:generate
	- php artisan migrate:fresh --seed
	- (for running tests) php artisan test

- Default demo user password is: password
