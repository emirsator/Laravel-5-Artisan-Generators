<?php

namespace EmirSator\Generators\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;

class EntityMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:entity';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a entity with all required files';
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Entity';
    
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
        $this->makeRepository();
    }

    /**
     * Generate an Eloquent model, if the user wishes.
     */
    protected function makeRepository()
    {
        $name = $this->argument('name');

        $this->info($name);

        // if ($this->files->exists($path = $this->getPath($name))) {
        //     return $this->error($this->type . ' already exists!');
        // }

        // $this->makeDirectory($path);
        // $this->files->put($path, $this->compileMigrationStub());
        // $this->info('Migration created successfully.');
        // $this->composer->dumpAutoloads();
    }
}