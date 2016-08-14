# Laravel Recaptcha

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


## Description

reCAPTCHA is a free CAPTCHA service that protect websites from spam and abuse.

## Install

Via Composer

``` bash
$ composer require pherum/laravel-recaptcha
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

```php
'providers' => [
    ...
    PheRum\Recaptcha\RecaptchaServiceProvider::class,
];
```

And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    ...
    'Recaptcha' => PheRum\Recaptcha\Facades\Recaptcha::class,
];
```

## Configuration

Laravel Recaptcha supports optional configuration.

To get started, you'll need to publish all vendor assets:

```bash
php artisan vendor:publish --provider="PheRum\Recaptcha\RecaptchaServiceProvider"
```

This will create a `config/recaptcha.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

## Usage

##### Validate a captcha in controller

```php
$this->validate($request, [
    'g-recaptcha-response' => 'required|recaptcha',
]);
```

##### Render captcha

```php
{!! Recaptcha::render() !!}
```

##### Render captcha with options

```php
{!! Recaptcha::render(['lang' => 'en']) !!}
```

## Testing

```bash
composer test
```

## Security

If you discover any security related issues, please email pherum@mail.ru instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pherum/laravel-recaptcha.svg?style=flat
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat
[ico-travis]: https://img.shields.io/travis/pherum/laravel-recaptcha/master.svg?style=flat
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/pherum/laravel-recaptcha.svg?style=flat
[ico-code-quality]: https://img.shields.io/scrutinizer/g/pherum/laravel-recaptcha.svg?style=flat
[ico-downloads]: https://img.shields.io/packagist/dt/pherum/laravel-recaptcha.svg?style=flat

[link-packagist]: https://packagist.org/packages/pherum/laravel-recaptcha
[link-travis]: https://travis-ci.org/pherum/Laravel-Recaptcha
[link-scrutinizer]: https://scrutinizer-ci.com/g/pherum/laravel-recaptcha/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/pherum/laravel-recaptcha
[link-downloads]: https://packagist.org/packages/pherum/laravel-recaptcha
[link-author]: https://github.com/pherum
[link-contributors]: ../../contributors