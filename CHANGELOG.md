# Changelog

All notable changes to `laravel-specification-pattern` will be documented in this file.

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

[v2.3.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.2.0...v2.3.0
[v2.2.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.1.0...v2.2.0
[v2.1.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v2.0.0...v2.1.0
[v2.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v1.1.0...v2.0.0
[v1.1.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v1.0.0...v1.1.0
[v1.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/releases/tag/v1.0.0
