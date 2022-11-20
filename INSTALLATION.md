## [Blog Application Installation Guide](https://packagist.org/packages/monish-khatri/blog-application)
<p>
    <a href="https://packagist.org/packages/lmonish-khatri/blog-application">
        <img src="https://img.shields.io/packagist/dt/monish-khatri/blog-application" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/monish-khatri/blog-application">
        <img src="https://img.shields.io/packagist/v/monish-khatri/blog-application" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/monish-khatri/blog-application">
        <img src="https://img.shields.io/packagist/l/monish-khatri/blog-application" alt="License">
    </a>
    <a href="https://packagist.org/packages/monish-khatri/blog-application">
        <img src="https://img.shields.io/packagist/stars/monish-khatri/blog-application" alt="License">
    </a>
</p>

### Follow the below steps to install blog application
- Install the package using
  - `composer require monish-khatri/blog-application`
- Run below command to publish package classes
  - `php artisan blog:install`
- Finally, Run the migrations to create package tables
  - `php artisan migrate`
- You can publish the package config file & change site logo and favicon with email preference
  - `php artisan vendor:publish --provider="MonishKhatri\Blog\BlogServiceProvider" --tag="config"`
