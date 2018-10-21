# Laravel 5 Custom artisan generators

Is designed to be used as a helper library to improve development process.

Usage:
php artisan make:entity <Entity_Name>

For now, there is one command planned. The command should create:
- App\Http\Controllers\<class_name>
- App\Http\Requests\<class_name>
- App\Repositories\Interfaces\<class_name>
- App\Repositories\<class_name>
- App\Services\Interfaces\<class_name>
- App\Services\<class_name>
- Routes\web\<class_name>
- Resources\View\<class_name>\create.blade.php
- Resources\View\<class_name>\details.blade.php
- Resources\View\<class_name>\edit.blade.php
- Resources\View\<class_name>\index.blade.php
- Resources\Lang\<locale>\<class_name>

More to come

Step 2: Add the Service Provider
You'll only want to use these generators for local development, so you don't want to update the production providers array in config/app.php. Instead, add the provider in app/Providers/AppServiceProvider.php, like so:

public function register()
{
	if ($this->app->environment() == 'local') {
		$this->app->register('EmirSator\Generators\GeneratorsServiceProvider');
	}
}
