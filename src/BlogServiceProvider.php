<?php

namespace MonishKhatri\Blog;

use App\Models\Blog;
use App\Models\User;
use App\Policies\BlogPolicy;
use App\Http\Middleware\ChangeSiteLanguage;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Blog::class => BlogPolicy::class,
    ];

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
        $this->loadRoutesFrom(__DIR__ .  '/../stubs/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ .  '/../stubs/database/migrations');

        // Merge and publish config file
        $this->mergeConfigFrom(__DIR__ . '/../stubs/config/blog-application.php', 'blog-application');
        $this->publishes([
            __DIR__ . '/../stubs/config/blog-application.php' => config_path('blog-application.php'),
        ]);

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('change_site_lang', ChangeSiteLanguage::class);
        $this->commands([
            Console\InstallCommand::class,
        ]);
        $this->registerPolicies();

        Gate::define('isOwner', function (User $user, Blog $blog) {
            return $user->id === $blog->user_id;
        });

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });
    }
}
