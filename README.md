# Blog API starter

This is a project based in a standard JSON API. It uses the authentication based in JWT using Passport.

## Getting started

### Launch the starter project

*(Assuming you've [installed Laravel](https://laravel.com/docs/7.x))*

Fork this repository, then clone your fork, and run this in your newly created directory:

``` bash
composer install
```

Next you need to make a copy of the `.env.example` file and rename it to `.env` inside your project root.

Run the following command to generate your app key:

```
php artisan key:generate
```

Then start your server:

```
php artisan serve
```

Next config your database and use:
```
php artisan migrate
```

now you can use for the authentication:
```
php artisan passport:install
```

*If you need more information about laravel passport then you can read the documentation
([Laravel Passport]https://laravel.com/docs/7.x/passport#introduction))*

Your Laravel starter project is now up and running! 


## Licence
The Laravel framework and this project is open-sourced software licensed under the MIT license.
