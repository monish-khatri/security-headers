<?php

namespace MonishKhatri\SecurityHeaders;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class SecurityHeadersServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        // Merge and publish config file
        $this->publishes([
            __DIR__ . '/../stubs/config/security-headers.php' => config_path('security-headers.php'),
        ], 'config');

        $this->commands([
            Console\InstallCommand::class,
        ]);

        $this->registerPolicies();
    }
}
