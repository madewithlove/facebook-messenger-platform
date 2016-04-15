# madewithlove/

[![Build Status](http://img.shields.io/travis/madewithlove/facebook-messenger-platform.svg?style=flat-square)](https://travis-ci.org/madewithlove/facebook-messenger-platform)
[![Latest Stable Version](http://img.shields.io/packagist/v/madewithlove/facebook-messenger-platform.svg?style=flat-square)](https://packagist.org/packages/madewithlove/facebook-messenger-platform)
[![Total Downloads](http://img.shields.io/packagist/dt/madewithlove/facebook-messenger-platform.svg?style=flat-square)](https://packagist.org/packages/madewithlove/facebook-messenger-platform)
[![Scrutinizer Quality Score](http://img.shields.io/scrutinizer/g/madewithlove/facebook-messenger-platform.svg?style=flat-square)](https://scrutinizer-ci.com/g/madewithlove/facebook-messenger-platform/)
[![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/madewithlove/facebook-messenger-platform.svg?style=flat-square)](https://scrutinizer-ci.com/g/madewithlove/facebook-messenger-platform/)

A set of helpers to communicate with the [Facebook Messenger Platform](https://developers.facebook.com/docs/messenger-platform)

## Goals

## Install

Via Composer

``` bash
$ composer require madewithlove/facebook-messenger-platform
```

## Usage

### Creating a client

This package assumes you have followed the [getting started](https://developers.facebook.com/docs/messenger-platform/quickstart) guide and
have received an access token for the Facebook page.

```php
use Madewithlove\FacebookMessengerPlatform\Api\HttpClient;
use Madewithlove\FacebookMessengerPlatform\Api\Client;

$httpClient = new HttpClient('your_access_token');
$client = new Client($httpClient);
```

### Sending Messages

#### Text

```php
$client->send()->message('recipient_id', 'hello world');
```

#### Image

```php
$client->send()->image('recipient_id', 'http://url-to-image.com');
```

#### Generic Template

Takes the recipient ID and an array of elements. Refer to the [documentation](https://developers.facebook.com/docs/messenger-platform/send-api-reference#generic_template)
for what the elements can consist of.

```php
$client->send()->generic('recipient_id', []);
```

#### Buttons Template

Takes the recipient ID, an array of buttons and a text. Refer to the [documentation](https://developers.facebook.com/docs/messenger-platform/send-api-reference#button_template)
for what the elements can consist of.

```php
$client->send()->buttons('recipient_id', []);
```

#### Receipt Template

Takes the recipient ID and an payload for the receipt. Refer to the [documentation](https://developers.facebook.com/docs/messenger-platform/send-api-reference#receipt_template)
for what the receipt can consist of.

```php
$client->send()->buttons('recipient_id', []);
```

## TODO

- [ ] Welcome message configuration
- [ ] User Profile

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
