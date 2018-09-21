<?php

namespace EmirSator\Generators\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;

class EntityMakeCommand extends Command
{
    /**
     * The console signature.
     *
     * @var string
     */
    protected $signature = 'make:entity {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a entity with all required files';
    
    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * @var Composer
     */
    private $composer;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     * @param Composer $composer
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
        $this->composer = app()['composer'];
    }

    /**
     * Alias for the fire method.
     *
     * In Laravel 5.5 the fire() method has been renamed to handle().
     * This alias provides support for both Laravel 5.4 and 5.5.
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $name = $this->argument('name');

        $this->makeEntity($name);
    }

    /**
     * Generate an entity.
     */
    protected function makeEntity($name)
    {
        $this->info($name);

        // if ($this->files->exists($path = $this->getPath($name))) {
        //     return $this->error($this->type . ' already exists!');
        // }

        // $this->makeDirectory($path);
        // $this->files->put($path, $this->compileMigrationStub());

        $this->generateFile('App\Http\Controllers\\'.$name.'Controller.php', $this->compileStub('Http\Controllers\Controller', $name));

        /**
         - App\Http\Controllers\<class_name>
        - App\Http\Requests\<class_name>
        - App\Repositories\Interfaces\<class_name>
        - App\Repositories\<class_name>
        - App\Services\Interfaces\<class_name>
        - App\Services\<class_name>

         */
        
        $this->composer->dumpAutoloads();
    }

    protected function compileStub($stubName, $inputEntityName)
    {
        $stub = $this->files->get(__DIR__ . '\..\stubs\\' . $stubName .'.stub');

        // Remove "-" from the entity name
        $entityName = str_replace('_', '', $inputEntityName);
        $entityNameLower = strlower(str_replace('_', '-', $inputEntityName));
        
        $stub = str_replace('{{entity}}', $entityName, $stub);
        $stub = str_replace('{{entity-lower}}', $entityNameLower, $stub);

        return $stub;
    }

    protected function generateFile($path, $content)
    {
        $this->files->put($path, $content);
    }
}