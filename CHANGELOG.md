# Changelog

All notable changes to `laravel-specification-pattern` will be documented in this file.

## [v3.0.1] - 2026-01-05

### Added

- Support for Webmozart's Assert library version 2.
- Support for PHP version 8.5.

## [v3.0.0] - 2025-02-26

### Added

- Support for Laravel 12.

### Removed

- Deprecated `meets` method.
- Support for Laravel 10.
- Support for PHP 8.1.

## [v2.8.0] - 2024-11-21

### Added

- Transformer to transform specifications into Laravel authorization access responses.

## [v2.7.0] - 2024-11-20

### Added

- Support for custom exception code.

## [v2.6.0] - 2024-09-20

### Added

- Add `dissatisfies` method.

## [v2.5.0] - 2024-08-24

### Changed

- Deprecate `meets` method in favor of `satisfies`.

## [v2.4.0] - 2024-08-24

### Added

- Add override attributes.
- Add constructor property assertions.

## [v2.3.0] - 2024-04-06

### Added

- Ability to make specification verbose using composite specification.
- Exclusive or specification.
- `HasSpecifications` trait.

## [v2.2.0] - 2024-03-13

### Added

- Support for Laravel 11.

## [v2.1.0] - 2024-03-08

### Added

- Support for PHP 8.3.

### Removed

- Support for Laravel 9.
- Support for PHP 8.0.

## [v2.0.0] - 2023-03-21

### Added

- Support for Laravel 10.

### Changed

- Renamed `SpecificationException` to `DissatisfiedSpecification` and extend from `DomainException`.
- Marked the following classes as final:
  - `AndSpecification`.
  - `NotSpecification`.
  - `OrSpecification`.
  - `VerboseSpecification`.

### Removed

- Support for PHP 8.
- Support for Laravel 8.

## [v1.1.0] - 2022-03-07

### Added

- Support for Laravel 9.

## [v1.0.0] - 2022-01-21

- initial release

[v3.0.1]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v3.0.0...v3.0.1
[v3.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.8.0...v3.0.0
[v2.8.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.7.0...v2.8.0
[v2.7.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.6.0...v2.7.0
[v2.6.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.5.0...v2.6.0
[v2.5.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.4.0...v2.5.0
[v2.4.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.3.0...v2.4.0
[v2.3.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.2.0...v2.3.0
[v2.2.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.1.0...v2.2.0
[v2.1.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.0.0...v2.1.0
[v2.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v1.1.0...v2.0.0
[v1.1.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v1.0.0...v1.1.0
[v1.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/releases/tag/v1.0.0
