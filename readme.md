# Laravel custom artisan generators

Is designed to be used as a helper library to improve development process.

Usage:
php artisan make:entity <Entity_Name>

Command will create following files:
- app\Http\Controllers\<Entity_Name>
- app\Http\Requests\<Entity_Name>
- app\Repositories\Interfaces\<Entity_Name>
- app\Repositories\<Entity_Name>
- app\Services\Interfaces\<Entity_Name>
- app\Services\<Entity_Name>
- routes\web\<Entity_Name>
- resources\View\<Entity_Name>\create.blade.php
- resources\View\<Entity_Name>\details.blade.php
- resources\View\<Entity_Name>\edit.blade.php
- resources\View\<Entity_Name>\index.blade.php
- resources\Lang\en\<Entity_Name>

More to come

Step 2: Add the Service Provider

public function register()
{
	$this->app->register('emirsator\Generators\GeneratorsServiceProvider');
}
