# ZF2 Restful API Example

This is an example application showing how to create a RESTful JSON API using PHP and [Zend Framework 2](http://framework.zend.com/). It starts from a clean base rather than the skeleton app as that includes a load of files which are unnecessary for an API (language and html view files). Matches the [ZF2 Album example](http://framework.zend.com/manual/2.2/en/user-guide/overview.html) but without the DB logic for simplicity. Examples of how to test the application will be included in part 2.

## Requirements

* PHP 5.3+
* Web server [setup with virtual host to serve project folder](http://framework.zend.com/manual/2.2/en/user-guide/skeleton-application.html#virtual-host)
* [Composer](http://getcomposer.org/) (manage dependencies)

## Creating the API

1. Get composer:

    ```
    curl -sS https://getcomposer.org/installer | php
    ```
    
2. Install the dependencies:

    ```
    php composer.phar install
    ```
3. Prepare DB
	```
	sh scripts/reset-db-sqlite.sh
	```
	
4. Update composer with new DB models
  	```
	php composer.phar update
	```
