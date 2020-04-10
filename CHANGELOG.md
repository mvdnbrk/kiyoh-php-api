# Changelog

All notable changes to `kiyoh-php-api` will be documented in this file.

## [Unreleased]

## [v2.4.0] - 2020-04-10

### Fixed
- Fixed version constraint for `tightenco/collect` [`ba06bd3`](https://github.com/mvdnbrk/kiyoh-php-api/commit/ba06bd3df5f54e63ec8657596972208fdf37e013)

### Removed
- Removed support for PHP 7.1 [`d347d24`](https://github.com/mvdnbrk/kiyoh-php-api/commit/d347d247a4743c892cc98f4642d461e768334387)

## [v2.3.0] - 2020-03-06

### Added
- Added support for Guzzle 7. [`619a04c`](https://github.com/mvdnbrk/kiyoh-php-api/commit/619a04c5ec113c44139a81c799143ffb754f84a0)
- Added support for Laravel 7. [`1beec805`](https://github.com/mvdnbrk/kiyoh-php-api/commit/1beec80569510100f4d93dc2b9bff8e86b946314)

## [v2.2.3] - 2020-02-15

### Changed
- The `KiyohServiceProvider` now implements the `DeferrableProvider`. [`4accf8f`](https://github.com/mvdnbrk/kiyoh-php-api/commit/4accf8f9eff29303a8cf8f5aa64018ed7e55b84b)
- Updated version constraints. [`2fe822a`](https://github.com/mvdnbrk/kiyoh-php-api/commit/2fe822a06519acfd5bb49e1f5c2b4587552fffac), [`9451bdd`](https://github.com/mvdnbrk/kiyoh-php-api/commit/9451bdd789056417369a00f43a91b74f225f79fa)

## [v2.2.2] - 2019-11-19

### Changed
- Updated version constraints. [`2da949a`](https://github.com/mvdnbrk/kiyoh-php-api/commit/2da949a937999fcedc595775b057f32072a02860), [`883f305`](https://github.com/mvdnbrk/kiyoh-php-api/commit/883f3050cd43ac26ac1bc9984c66ead54c9de642)

## [v2.2.1] - 2019-06-16

### Fixed
- Require `scrutinizer/ocular` as dev dependency.

## [v2.2.0] - 2019-06-16

### Added
- Added function hasText() to Review. [`f106685`](https://github.com/mvdnbrk/kiyoh-php-api/commit/f106685b41874bb4a8f1e7c11eb897624f1bb800)
- Added function hasHeadline() to Review. [`eaf6ea4`](https://github.com/mvdnbrk/kiyoh-php-api/commit/eaf6ea44bb39c071fc28082682289577c9331e81)

### Changed
- Set a default value for recommendation. [`fba5515`](https://github.com/mvdnbrk/kiyoh-php-api/commit/fba5515bc9a334d6d12538841072aaa91b589400)

## [v2.1.0] - 2019-06-15

### Changed
- Save the recommendation of a review in it's own column. [`f2f502b`](https://github.com/mvdnbrk/kiyoh-php-api/commit/f2f502b02a1986e9dd6a6674810de91d06d8792d)

## [v2.0.2] - 2019-06-15

- Sort reviews by creation date before importing. [`75c6306`](https://github.com/mvdnbrk/kiyoh-php-api/commit/75c6306e193fb9953501f03d637642735d770f1b)

## [v2.0.1] - 2019-06-15

### Changed
- Removed rating attribute from the payload. [`a554d6d`](https://github.com/mvdnbrk/kiyoh-php-api/commit/a554d6d88212eefde2d23fbf9f0300a0ae8f7081)

## [v2.0.0] - 2019-06-15

### Changed
- Updated for the new feed.

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

[Unreleased]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.4.0...HEAD
[v2.4.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.3.0...v2.4.0
[v2.3.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.2.3...v2.3.0
[v2.2.3]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.2.2...v2.2.3
[v2.2.2]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.2.1...v2.2.2
[v2.2.1]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.2.0...v2.2.1
[v2.2.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.1.0...v2.2.0
[v2.1.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.0.2...v2.1.0
[v2.0.2]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.0.1...v2.0.2
[v2.0.1]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v2.0.0...v2.0.1
[v2.0.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.3...v2.0.0
[v1.2.3]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.2...v1.2.3
[v1.2.2]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.1...v1.2.2
[v1.2.1]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.2.0...v1.2.1
[v1.2.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.4...v1.2.0
[v1.1.4]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.3...v1.1.4
[v1.1.3]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.2...v1.1.3
[v1.1.2]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.1...v1.1.2
[v1.1.1]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.1.0...v1.1.1
[v1.1.0]: https://github.com/mvdnbrk/kiyoh-php-api/compare/v1.0.0...v1.1.0
