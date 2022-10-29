# Application Starter

Restapi is a PHP CodeIgniter RestAPI full-stack web framework that is light, fast, flexible and secure.


## Installation & updates

Clone the repository
`git clone https://github.com/Hervepoh/restapi-ci4` 

Install all PHP dependances
`composer install` 


## Setup

`cp env .env`
Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

`
CI_ENVIRONMENT = production 
app.baseURL = "http://localhost:8080/" 
database.default.hostname = localhost
database.default.database = ci4_restapi_test
database.default.username = ci4
database.default.password = ci4
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
database.default.dsn ='mysql:dbname=restapi-ci4;host=localhost'
`
Create the database 
`php spark db:create ci4_restapi` 

Migrate  
`php spark migrate`

Purchage fake data
`php spark db:seed Init` //Je dois corriger le bug sur les seeders


## Customize the Oauth 
In App\Libreries\CustomOauthStorage
 * function getUser
 * function checkPassword
 * function hashPassword


## helpfull link :
[oauth2-server-php-docs](https://bshaffer.github.io/oauth2-server-php-docs/)
[ci4 development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
