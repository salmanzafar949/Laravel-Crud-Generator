# Laravel CRUD Generator

A simple Laravel 5 library that allows you to create crud operations with a single command

## Installation
```
composer require salmanzafar/laravel-crud-generator
```
## Features

* Controller (with all the code already written)
* Model
* Migration
* Requests
* Routes

## Enable the package (Optional)
This package implements Laravel auto-discovery feature. After you install it the package provider and facade are added automatically for laravel >= 5.5.

## Configuration
Publish the configuration file

This step is required

```
php artisan vendor:publish --provider="Salman\CrudGenerator\CrudGeneratorServiceProvider"
```

## Usage

After publsihing the configuration file just run the below command

```
php artisan crud:generate ModelName
```

Just it, Now all of your `Model Controller, Migration, routes` and `Request` will be created automatically with all the code required for operations

### Tested on php 7.3 and laravel 5.7 and also laravel 5.8

### Currently this package supports only CRUD operation for api's 