# kiyoh-php-api

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![StyleCI][ico-style-ci]][link-style-ci]
[![Total Downloads][ico-downloads]][link-downloads]

## Installation

You can install the package via composer:

```bash
composer require mvdnbrk/kiyoh-php-api
```

## Get started

Initialize the KiyOh client and set your API key and company ID:

``` php
$client = new \Mvdnbrk\Kiyoh\Client();

$client->setApiKey('your-connector-code');
$client->setCompanyId('1234');
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

If you would like to retrieve all reviews you may use the `all()` method:

```php
$feed = $kiyoh->feed->all()->get();
```

### Company statistics
```php
$feed->company->views;
$feed->company->reviewCount;
$feed->company->aggregateRating;
```
## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mvdnbrk@gmail.com instead of using the issue tracker.

## Credits

- [Mark van den Broek](https://github.com/mvdnbrk)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mvdnbrk/kiyoh-php-api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mvdnbrk/kiyoh-php-api/master.svg?style=flat-square
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
