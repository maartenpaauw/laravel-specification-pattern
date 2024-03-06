# Changelog

All notable changes to `laravel-specification-pattern` will be documented in this file.

## Unreleased

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

[v2.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v1.1.0...v2.0.0
[v1.1.0]: https://github.com/maartenpaauw/laravel-specification-pattern/compare/v1.0.0...v1.1.0
[v1.0.0]: https://github.com/maartenpaauw/laravel-specification-pattern/releases/tag/v1.0.0
