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

After publishing the configuration file just run the below command

```
php artisan crud:generate ModelName
```

Just it, Now all of your `Model Controller, Migration, routes` and `Request` will be created automatically with all the code required for operations

## Example

```angular2
php artisan crud:generate Car
```
#### CarController.php
```angular2
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();

        return response()->json($cars, 201);
    }

    public function store(CarRequest $request)
    {
        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);

        return response()->json($car);
    }

    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        return response()->json($car, 200);
    }

    public function destroy($id)
    {
        Car::destroy($id);

        return response()->json(null, 204);
    }
}
```

#### Car.php
```angular2
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];
}
```

#### CarRequest.php
```angular2
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
```

#### cars table migration
```angular2
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
``` 

#### Routes/api.php
```angular2
Route::apiResource('cars', 'CarController'); 
```

##### Now all of your basic apis are ready to use you can use them directly by just adding fields in your table

### Tested on php 7.3 and laravel 5.7 and also laravel 5.8

### Currently this package supports only CRUD operation for api's 
