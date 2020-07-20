# API-Package
This library provides an interface to AAM's API.

## Getting Started
These instructions assume you already have an API key with access to use AAM's API.

The API library can be added to a PHP project using Composer.

```
composer require theaamgroup/api-package
```

It's recommended to use some sort of autoloading function for the library's classes, but you can also `require`/`include` the files you need. You can see usage of this in the `examples` folder. 

## Authentication
All endpoints, with the exception of the Prop 65 endpoint, will require a valid API key passes as the `X-API-KEY` header. If your request is not authenticated correctly, you will receive an error response with 401 as the status code and "Invalid API key" as the error message.

Perform your authentication by passing your API key to the `Auth` constructor, then pass the Auth object to the endpoint you want to use. [View an example](https://github.com/theaamgroup/API-Package/blob/master/examples/Authentication/index.php).

## Sample Code
The `examples` folder contains sample code for the functions of every endpoint.
