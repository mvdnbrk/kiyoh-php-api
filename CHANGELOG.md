# Changelog

All notable changes to `kiyoh-php-api` will be documented in this file.

## [Unreleased]

## [v1.2.3] - 2019-03-17

### Changed
- Updated packages. [`6366f5a`](https://github.com/mvdnbrk/kiyoh-php-api/commit/6366f5a2e0556ed47d27b655fa7173ac6c422460)

## [v1.2.2] - 2019-02-10

### Added
- Added function hasName() to Author. [`b2fdaed`](https://github.com/mvdnbrk/kiyoh-php-api/commit/b2fdaed6b97583ffdc7c7bc56157e9a6601e4b85)
- Added function hasLocality() to Author. [`8d392ddd`](https://github.com/mvdnbrk/kiyoh-php-api/commit/8d392dddddcd8a2c3b65aaf9e5f4cf85d27705fa)

## [v1.2.1] - 2019-02-10

### Changed
- Set name and locality for an author to an empty string by default. [`d58447d4`](https://github.com/mvdnbrk/kiyoh-php-api/commit/d58447d481e35730a6830b04387fe809faaa1d27)
- Discard empty values for name and locality for an author. [`bc5dca6`](https://github.com/mvdnbrk/kiyoh-php-api/commit/bc5dca603b6aef53def4713970f05fe216765da7)
- Save the original created_at date/time from the review. [`2f4c285`](https://github.com/mvdnbrk/kiyoh-php-api/commit/2f4c285ae2006cd856abd35038261d28fa2d9784)
- Save the rating of a review in it's own column. [`a1c47ff`](https://github.com/mvdnbrk/kiyoh-php-api/commit/a1c47ff6f5b227b11ef56ce56c0287d73e453bec)

### Fixed
- Use `toArray()` instead of `toJson()` when saving record to database. [`b6444c6`](https://github.com/mvdnbrk/kiyoh-php-api/commit/b6444c6dabcae9a8f6be4223b47276b756fb7692)

## [v1.2.0] - 2019-02-09

### Added
- Added support for Laravel. [`#1`](https://github.com/mvdnbrk/kiyoh-php-api/pull/1)

## [v1.1.4] - 2019-02-09

### Fixed
- Fixed limit count comparison. [`73ab257`](https://github.com/mvdnbrk/kiyoh-php-api/commit/73ab257b9aac3cd819a58dd0aa4f5665622bc4b6)

## [v1.1.3] - 2019-02-09

### Fixed
- Fixed parsing a feed with only one review. [`5a34ef5`](https://github.com/mvdnbrk/kiyoh-php-api/commit/5a34ef53748550120d20e9dde3c6cf6a06a6c525)

## [v1.1.2] - 2019-02-08

### Added
- Throw an exception when no company is found. [`6176320`](https://github.com/mvdnbrk/kiyoh-php-api/commit/6176320b5b245406cca1a87ac2970c7ee2e980c6)

## [v1.1.1] - 2019-02-08

### Changed
- Convert a review to a plain array. [`b5f0f4d`](https://github.com/mvdnbrk/kiyoh-php-api/commit/b5f0f4da336f2a5ded206ee8357b1d639c445564)

## [v1.1.0] - 2019-02-08

### Added
- Added `hasPositiveComment()`. [`78f8bcc`](https://github.com/mvdnbrk/kiyoh-php-api/commit/78f8bcca350b2a7d08a651dc2d568c496b792317) 
- Added `hasNegativeComment()`. [`5f8b77e`](https://github.com/mvdnbrk/kiyoh-php-api/commit/5f8b77eafd51a10d1ae8ba06cd3f6900fb1c80b8) 

### Changed
- Changed `commentPositive` to `positiveComment`. [`73107cc`](https://github.com/mvdnbrk/kiyoh-php-api/commit/73107cc82c4465fb50f9a794db8fb91748bbe140)
- Changed `commentNegative` to `negativeComment`. [`54468dd`](https://github.com/mvdnbrk/kiyoh-php-api/commit/54468dda81b228b349d7569f0463c035552e4be8)

## v1.0.0 - 2019-02-08

### Initial realease

[Unreleased]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.3...HEAD
[v1.2.3]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.2...v1.2.3
[v1.2.2]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.1...v1.2.2
[v1.2.1]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.0...v1.2.1
[v1.2.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.4...v1.2.0
[v1.1.4]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.3...v1.1.4
[v1.1.3]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.2...v1.1.3
[v1.1.2]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.1...v1.1.2
[v1.1.1]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.0...v1.1.1
[v1.1.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.0.0...v1.1.0
