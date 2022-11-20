<?php

namespace MonishKhatri\Blog\Console;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

trait InstallsBladeStack
{
    /**
     * Install the Blade Breeze stack.
     *
     * @return void
     */
    protected function installBladeStack()
    {
        $this->runCommands(['php artisan breeze:install']);

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Http/Controllers', app_path('Http/Controllers'));

        // Middleware...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Middleware'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Http/Middleware', app_path('Http/Middleware'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Http/Requests', app_path('Http/Requests'));

        // Resources...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Resources'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Http/Resources', app_path('Http/Resources'));

        // Events...
        (new Filesystem)->ensureDirectoryExists(app_path('Events'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Events', app_path('Events'));

        // Jobs...
        (new Filesystem)->ensureDirectoryExists(app_path('Jobs'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Jobs', app_path('Jobs'));

        // Listeners...
        (new Filesystem)->ensureDirectoryExists(app_path('Listeners'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Listeners', app_path('Listeners'));

        // Mail...
        (new Filesystem)->ensureDirectoryExists(app_path('Mail'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Mail', app_path('Mail'));

        // Models...
        (new Filesystem)->ensureDirectoryExists(app_path('Models'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Models', app_path('Models'));

        // Notifications...
        (new Filesystem)->ensureDirectoryExists(app_path('Notifications'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Notifications', app_path('Notifications'));

        // Policies...
        (new Filesystem)->ensureDirectoryExists(app_path('Policies'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Policies', app_path('Policies'));

        // Langs...
        (new Filesystem)->ensureDirectoryExists(\App::langPath());
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/lang', \App::langPath());

        // migrations...
        (new Filesystem)->ensureDirectoryExists(database_path('migrations'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/database/migrations', database_path('migrations'));
        // seeders...
        (new Filesystem)->ensureDirectoryExists(database_path('seeders'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/database/seeders', database_path('seeders'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views', resource_path('views'));

        // Css...
        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/css', resource_path('css'));

        // Components...
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/View/Components', app_path('View/Components'));

        // Routes...
        (new Filesystem)->ensureDirectoryExists(base_path('routes'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/routes', base_path('routes'));

        $this->line('');
        $this->components->info('Blog scaffolding installed successfully.');
    }
}
