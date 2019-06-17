<?php

namespace Salman\CrudGenerator\CrudGeneratorClass;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CrudGeneratorService
{

    protected static function GetStubs($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }


    /**
     * @param $name
     * This will create controller from stub file
     */
    public static function MakeController($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower( Str::plural($name)),
                strtolower($name)
            ],

           CrudGeneratorService::GetStubs('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $template);

    }

    /**
     * @param $name
     * This will create model from stub file
     */
    public static function MakeModel($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            CrudGeneratorService::GetStubs('Model')
        );

        file_put_contents(app_path("/{$name}.php"), $template);
    }

    /**
     * @param $name
     * This will create Request from stub file
     */
    public static function MakeRequest($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
           CrudGeneratorService::GetStubs('Request')
        );

        if (!file_exists($path=app_path('/Http/Requests/')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $template);
    }

    /**
     * @param $name
     * This will create migration using artisan command
     */
    public static function MakeMigration($name)
    {
        Artisan::call('make:migration create_'. strtolower( Str::plural($name)).'_table --create='. strtolower( Str::plural($name)));

    }
}
