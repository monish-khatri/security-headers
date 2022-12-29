## [Laravel Security Headers Installation Guide](https://packagist.org/packages/monish-khatri/security-headers)
<p>
    <a href="https://packagist.org/packages/monish-khatri/security-headers">
        <img src="https://img.shields.io/packagist/dt/monish-khatri/security-headers" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/monish-khatri/security-headers">
        <img src="https://img.shields.io/packagist/v/monish-khatri/security-headers" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/monish-khatri/security-headers">
        <img src="https://img.shields.io/packagist/l/monish-khatri/security-headers" alt="License">
    </a>
    <a href="https://packagist.org/packages/monish-khatri/security-headers">
        <img src="https://img.shields.io/packagist/stars/monish-khatri/security-headers" alt="License">
    </a>
</p>

### Follow the below steps to install security header package
- Install the package using
  - `composer require monish-khatri/security-headers`
- Run below command to publish package classes
  - `php artisan security-headers:install`
- You can publish the package config file & change site logo and favicon with email preference
  - `php artisan vendor:publish --provider="MonishKhatri\SecurityHeaders\SecurityHeadersServiceProvider" --tag="config"`
- Add Middleware in `app/Http/Kernel.php`
    ```
    protected $middlewareGroups = [
        'web' => [
            ...
            \App\Http\Middleware\SecurityHeadersMiddleware::class,
        ],
    ```
