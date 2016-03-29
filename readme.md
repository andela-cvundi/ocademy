# [Ocademy](https://ocademy.herokuapp.com/)

[![Build Status](https://travis-ci.org/andela-cvundi/ocademy.svg?branch=master)](https://travis-ci.org/andela-cvundi/ocademy)
[![Coverage Status](https://coveralls.io/repos/github/andela-cvundi/ocademy/badge.svg?branch=develop)](https://coveralls.io/github/andela-cvundi/ocademy?branch=develop)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

**Ocademy** is an online learning platform where people share tutorilas online and also learn from the tutorials posted by other people.

## Features

**1. Create account**

Create an account using your email, facebook, twitter or github account in less than one minute.

**2. Manage tutorials**

Get to the dashboard area and upload, edit or delete tutorils.

**3. See what other peple have shared**

On the landing page you will see the latest tutorials that people have uploaded. Not satisfied? You can visit the tutorials page and filter tutorials by categories

**4. Favorite the tutorials you find interesting**

You can click on the like button below any tutorial you find interesting when watching the video

**5. Comment on videos**

You can comment on tutorials that you are watching, and also see waht other people have to say about the tutorial.


### Technologies used
1. [Laravel 5.2](https://laravel.com/)
2. [Bootstrap CSS](http://getbootstrap.com/)
3. [Postgres SQL](http://www.postgresql.org/)

A list of open source laravel packages used can be see in the [composer.json](https://github.com/andela-cvundi/ocademy/blob/staging/composer.json).


### Set up Locally
Make sure you have the requirements for laravel setup. If not, read the [Laravel Installation Guide](https://laravel.com/docs/5.2)

Clone this repo
```bash
$ git clone https://github.com/andela-cvundi/ocademy.git
```
Go into the **ocademy** folder
```bash
$ cd ocademy
```
Copy the **env.example** file into a **.env** and fill out the followign fields.
```text
APP_ENV=local
APP_DEBUG=true
APP_KEY=*your-app-key*

DB_HOST=localhost
DB_DATABASE=*your-db*
DB_USERNAME=*your-db-username*
DB_PASSWORD=*your-password*

CACHE_DRIVER=file
SESSION_DRIVER=file

FACEBOOK_ID=
FACEBOOK_SECRET=
FACEBOOK_URL=

GITHUB_ID=
GITHUB_SECRET=
GITHUB_URL=

TWITTER_ID=
TWITTER_SECRET=
TWITTER_URL=

CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
CLOUDINARY_NAME=
CLOUDINARY_URL=

```

Once you have all these set up, run composer, to install dependencies and run migrations.
```bash
$ composer install
```

If you set up this in you local environment, run
```bash
$ php artisan serve
```

If you used vagrant / Homestead, head over to where your Hosts point to.

To test this project, simply run
```bash
$ vendor/bin/phpunit
```

### License

The Watch n Learn project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


### Credits

- [Christopher Vundi][link-author]

[link-author]: https://github.com/andela-cvundi
