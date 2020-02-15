# kiyoh-php-api

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![StyleCI][ico-style-ci]][link-style-ci]
[![Total Downloads][ico-downloads]][link-downloads]

Simple PHP API to fetch your KiyOh reviews from the XML feed.

**For the previous version of the KiyOh feed please use the [1.0 branch](https://github.com/mvdnbrk/kiyoh-php-api/tree/1.0).**

## Installation

You can install the package via composer:

```bash
composer require mvdnbrk/kiyoh-php-api
```

## Getting started

Initialize the KiyOh client and set your API key and company ID:

``` php
$client = new \Mvdnbrk\Kiyoh\Client();

$client->setApiKey('your-secret-hash');
```

### Retrieve the KiyOh feed

```php
$feed = $client->feed->get();
```

By default this will retrieve the 10 most recent reviews.  
You may change the number of reviews to retrieve by using the `limit()` method:

```php
$feed = $kiyoh->feed->limit(25)->get();
```

The migrated reviews from the previous KiyOh platform are not included by default.
If you would like to retrieve the migrated reviews as well you may call the `withMigrated()` method:

```php
$feed = $kiyoh->feed->withMigrated()->get();
```

### Reviews

```php
$feed->reviews->each(function ($review) {
    $review->rating;
    $review->recommendation;
    $review->hasHeadline();
    $review->headline;
    $review->hasText();
    $review->text;
    $review->createdAt;
    $review->updatedAt;

    $review->author->hasName();
    $review->author->name;
    $review->author->hasLocality();
    $review->author->locality;
});
```

### Company properties and statistics
```php
$feed->company->id;
$feed->company->name;
$feed->company->reviewCount;
$feed->company->averageRating;
$feed->company->recommendationPercentage;
```

## Usage with Laravel

Update your `.env` file by adding your KiyOh sercret hash:

```
KIYOH_SECRET=YOUR-SECRET-HASH
```

To create a `kiyoh_reviews` table in your database run the `migrate` command:

```bash
php artisan migrate
```

To import your reviews in the database run the `kiyoh:import` command:

```bash
php artisan kiyoh:import
```

The table name can be changed in the `kiyoh.php` config file.
To publish the config file run:

```bash
php artisan vendor:publish --tag=kiyoh-config
```

To publish the migration file run:

```bash
php artisan vendor:publish --tag=kiyoh-migrations
```

If you are not going to use the default migrations, you should call the `Kiyoh::ignoreMigrations()` method in the register method of your `AppServiceProvider`. 

## Testing

``` bash
composer test
```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mvdnbrk@gmail.com instead of using the issue tracker.

## Credits

- [Mark van den Broek](https://github.com/mvdnbrk)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mvdnbrk/kiyoh-php-api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mvdnbrk/kiyoh-php-api/2.0.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/mvdnbrk/kiyoh-php-api.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/mvdnbrk/kiyoh-php-api.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mvdnbrk/kiyoh-php-api.svg?style=flat-square
[ico-style-ci]: https://styleci.io/repos/72292364/shield?branch=master

[link-packagist]: https://packagist.org/packages/mvdnbrk/kiyoh-php-api
[link-travis]: https://travis-ci.org/mvdnbrk/kiyoh-php-api
[link-scrutinizer]: https://scrutinizer-ci.com/g/mvdnbrk/kiyoh-php-api/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/mvdnbrk/kiyoh-php-api
[link-downloads]: https://packagist.org/packages/mvdnbrk/kiyoh-php-api
[link-author]: https://github.com/mvdnbrk
[link-contributors]: ../../contributors
[link-style-ci]: https://styleci.io/repos/168866337
