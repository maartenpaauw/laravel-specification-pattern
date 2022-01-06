# Laravel specification pattern

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maartenpaauw/laravel-specification-pattern.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-specification-pattern)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/maartenpaauw/laravel-specification-pattern/run-tests?label=tests)](https://github.com/maartenpaauw/laravel-specification-pattern/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/maartenpaauw/laravel-specification-pattern/Check%20&%20fix%20styling?label=code%20style)](https://github.com/maartenpaauw/laravel-specification-pattern/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/maartenpaauw/laravel-specification-pattern.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-specification-pattern)

Filter a Eloquent collection with specifications.

## Installation

You can install the package via composer:

```bash
composer require maartenpaauw/laravel-specification-pattern
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-specification-pattern-config"
```

This is the contents of the published config file:

```php
return [
    'collection-method' => 'matching',
];
```

## Usage

```php
$laravel-specification-pattern = new Maartenpaauw\Specifications();
echo $laravel-specification-pattern->echoPhrase('Hello, Maartenpaauw!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Maarten Paauw](https://github.com/maartenpaauw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
