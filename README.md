# Laravel specification pattern

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maartenpaauw/laravel-specification-pattern.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-specification-pattern)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/maartenpaauw/laravel-specification-pattern/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/maartenpaauw/laravel-specification-pattern/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/maartenpaauw/laravel-specification-pattern/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/maartenpaauw/laravel-specification-pattern/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Codecov](https://codecov.io/gh/maartenpaauw/laravel-specification-pattern/branch/main/graph/badge.svg?token=YM9A0DUA4R)](https://codecov.io/gh/maartenpaauw/laravel-specification-pattern)
[![Total Downloads](https://img.shields.io/packagist/dt/maartenpaauw/laravel-specification-pattern.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-specification-pattern)

Filter an Illuminate collection with specifications.

## Support me

<p class="filament-hidden">
    <a href="https://filamentphp.com/plugins/maartenpaauw-pennant">
        <img src="https://raw.githubusercontent.com/maartenpaauw/pennant-for-filament-docs/main/assets/screenshots/banner.jpg"
            alt="Pennant for Filament"
            width="700px" />
    </a>
</p>

You can support me by [buying Pennant feature flags for Filament](https://filamentphp.com/plugins/maartenpaauw-pennant).

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

Here's how you can create a specification:

```shell
php artisan make:specification AdultSpecification
```

This will generate a specification class within the `App\Specifications` namespace.

```php
<?php

namespace App\Specifications;

use Maartenpaauw\Specifications\Specification;

/**
 * @implements  Specification<mixed>
 */
class AdultSpecification implements Specification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
        return true;
    }
}
```

Imagine we have the following class which represents a person with a given age.

```php
class Person {
    public function __construct(public int $age)
    {}
}
```

Let's apply the business logic:

```diff
<?php

namespace App\Specifications;

use Maartenpaauw\Specifications\Specification;

/**
- * @implements  Specification<mixed>
+ * @implements  Specification<Person>
 */
class AdultSpecification implements Specification
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(mixed $candidate): bool
    {
-        return true;
+        return $candidate->age >= 18;
    }
}
```

After applying the bussiness logic we can use the specification by **directly** calling the `isSatisfiedBy`
method or **indirectly** be filtering an eloquent collection by calling the `matching` method.

### Direct

```php
$specification = new AdultSpecification();

// ...

$specification->isSatisfiedBy(new Person(16)); // false
$specification->isSatisfiedBy(new Person(32)); // true
```

### Indirect

```php
$persons = collect([
    new Person(10),
    new Person(17),
    new Person(18),
    new Person(32),
]);

// ...

// Returns a collection with persons matching the specification
$persons = $persons->matching(new AdultSpecification());

// ...

$persons->count(); // 2
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
