<p align="center"><a href="https://www.edukey.co.uk/" target="_blank"><img src="https://www.edukey.co.uk/wp-content/themes/edukey-v2/img/logo.png"></a></p>

# EDUKEY ASSESSMENT

For this assessment, the task is to create an TODO simple app. The actions will be handle by AJAX calls.

## Requirements

1. PHP needs to be a minimum version of PHP 5.6.4
2. OpenSSL PHP Extension
3. PDO PHP Extension
4. Mbstring PHP Extension
5. Tokenizer PHP Extension
6. XML PHP Extension
7. Git working on command line
8. Composer working on command line

## Getting Started

The assesment is built on Laravel 5 framework.

To setup the project in your local machine, please follow the next steps:

1.Clone the repo and change your directory to 'edukey_test'

```sh
$ git clone https://github.com/rafa1944/edukey-test edukey_test
```
2.Download vendor dependencies with composer
```sh
$ composer install
```
3.Generate a key
```sh
$ php artisan key:generate
```
4.Run migrations to create DB & tables
```sh
$ php artisan migrate
```
5.Activate the server
```sh
$ php -S localhost:3000 -t public
```

Now, point your browser to [localhost:3000](http://localhost:3000)



## Where is the core?

The most important files to check the assessment are:

- Where all the backend happens
```php
\App\Http\Controllers\TaskController.php
```
- Where all the frontend happens
```php
\public\js\app.js
```
- Where we check that the user is the owner of the task, so he can delete it
```php
\App\Policies\TaskPolicy.php
```
- Where we loggin the user with Google and add it to our DB
```php
\App\Http\Controllers\Auth\LoginController.php
```
- Where you can find the Repository pattern for Task model
```php
\App\Repositories\TaskRepository.php
```

## Best practices

I´ve developed this test using SOLID principles.

I´ve used Dependency Injection & Single Responsability with the Repository Pattern.

## Any problem?

Send me an email anytime.
