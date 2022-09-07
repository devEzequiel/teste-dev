## Books Project

To run the project on your local environment, first follow the API documentation in this page.

Then, run the React project in your local environment,  following [this documentation](https://github.com/devEzequiel/teste-dev/blob/ez-develop/resources/frontend/README.md)

## A Laravel API

## Requirements

As it is build on the Laravel framework, it has a few system requirements.

- PHP >= 8.0
- MySql >= 5.7
- Composer

You can check all the laravel related dependecies
[here](https://laravel.com/docs/9.x/deployment#server-requirements)

## Running the API
Clone the repository and setup

`$ git clone git@github.com:devEzequiel/teste-dev.git` <br />
`$ cd teste-dev` <br />

Then, create the database named `books` and add them to the `.env` file.

```
DB_DATABASE=books
DB_USERNAME=your_db_user
DB_PASSWORD=your_password
```

Then install, migrate, seed, all that jazz:

1. `$ composer install`
2. `$ php artisan migrate:fresh --seed`
3. `$ php artisan key:generate`
4. `$ php artisan serve`

The API will be running on `localhost:8000`


## API Endpoints and Routes

Access the ./insomnia folder to get the Insomnia collection with all routes setted.

Laravel follows the Model View Controller (MVC) pattern I have created models associated with
each resource. You can check in the [routes/api.php](https://github.com/devEzequiel/teste-dev/blob/ez-develop/routes/api.php) 
file for all the routes that map to controllers in order to send out JSON data that make requests to our API.


## Authorization

Some routes are protected by sanctum middleware.
To have access, login and use the **Bearer Token** that will be returned with the json response.
