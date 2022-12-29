<?php

namespace MonishKhatri\SecurityHeaders\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallSecurityHeadersStack
{
    /**
     * Install the Security Headers Middleware.
     *
     * @return void
     */
    protected function installSecurityHeadersStack()
    {
        // Middleware...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Middleware'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/Http/Middleware', app_path('Http/Middleware'));


        $this->line('');
        $this->components->info('Security Headers scaffolding installed successfully.');
    }
}
