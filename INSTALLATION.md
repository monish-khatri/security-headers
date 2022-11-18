## [Blog Application Installation Guide](https://packagist.org/packages/monish-khatri/blog-application)

### Follow the below install blog application
- Install the package using 
  - `composer require monish-khatri/blog-application`
- Run below command to publish package classes
  - `php artisan blog:install`
- Finally, Run the migrations to create package tables
  - `php artisan migrate`
- You can publish the package config file
  - `php artisan vendor:publish --provider="MonishKhatri\Blog\BlogServiceProvider" --tag="config"`
