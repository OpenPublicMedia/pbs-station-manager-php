# PBS Station Manager PHP Library

This library abstracts interactions with the
[PBS Station Manager API](https://docs.pbs.org/display/SM/API).

## Installation

Install via composer:

```bash
composer require openpublicmedia/pbs-station-manager-php
```

## Use

The primary class provided by this library is the
`OpenPublicMedia\PbsStationManager\Client`. A `Client` instance can be used to
query the API in various ways. An API key and secret is optional, as the Station
Manager API provides public and internal endpoints.

### Response data structures

The API currently only support retrieving station information so `Client`
provides two methods:

- `getStation($id)`
- `getStations()`

Both methods return `OpenPublicMedia\PbsStationManager\Entity\Station` instances.
A single instance for the singular getter and an array of instances for the
plural getter.

### Examples

#### Creating a client

```php
use OpenPublicMedia\PbsStationManager\Client;

$api_key = 'xxxxxxxxxxxxxx';
$api_secret = 'xxxxxxxxxxx';

$client = new Client($api_key, $api_secret);
```

#### Getting a single Station

```php
$station = $client->getStation('271a9ab7-e9ed-4fec-9fe9-e46c97a3f8f0');
var_dump($station);
class OpenPublicMedia\PbsStationManager\Entity\Station#40 (35) {
  private $id => string(36) "271a9ab7-e9ed-4fec-9fe9-e46c97a3f8f0"
  private $callSign => string(4) "KCTS"
  private $fullCommonName => string(6) "KCTS 9"
  private $shortCommonName => string(6) "KCTS 9"
  private $tagLine => string(25) "Inspiring a Smarter World"
  private $timezone => string(19) "America/Los_Angeles"
  private $secondaryTimezone => NULL
  private $passportEnabled => NULL
  private $annualPassportQualifyingAmount => NULL
  private $primaryChannel => string(4) "KCTS"
  private $primetimeStart => string(3) "8PM"
  private $tvssUrl => string(26) "https://kcts9.org/schedule"
  private $donateUrl => string(116) "https://www.callswithoutwalls.com/pledgeCart3/?campaign=DF609D70-0D2E-4AE2-8F52-28B9EAE991E0&source=TV1AM-W1809--003"
  private $kidsLiveStreamUrl => NULL
  private $websiteUrl => string(18) "https://kcts9.org/"
  private $facebookUrl => string(30) "https://www.facebook.com/KCTS9"
  private $twitterUrl => string(25) "https://twitter.com/kcts9"
  private $stationKidsUrl => NULL
  private $passportUrl => string(116) "https://www.callswithoutwalls.com/pledgeCart3/?campaign=DF609D70-0D2E-4AE2-8F52-28B9EAE991E0&source=TV1AM-W1809--003"
  private $videoPortalUrl => string(24) "https://video.kcts9.org/"
  private $videoPortalBannerUrl => string(18) "https://kcts9.org/"
  private $pdp => NULL
  private $addressLine1 => string(17) "401 Mercer Street"
  private $addressLine2 => NULL
  private $city => string(7) "Seattle"
  private $state => string(2) "WA"
  private $zipCode => string(5) "98109"
  private $countryCode => string(2) "US"
  private $email => string(20) "membership@kcts9.org"
  private $telephone => string(14) "(800) 937-5287"
  private $fax => string(14) "(206) 443-6691"
  private $images => array(3) {[...]}
  private $pageTracking => string(12) "UA-2418330-1"
  private $eventTracking => string(12) "UA-2418330-1"
  private $updatedAt => class DateTime#34 (3) {...}
}
```

#### Getting all Stations

```php
$stations = $client->getStations();
var_dump(count($stations));
int(156)
```

## Development goals

See [CONTRIBUTING](CONTRIBUTING.md) for information about contributing to
this project.

### v1

 - [x] API authentication (`OpenPublicMedia\PbsStationManager\Client`)
 - [x] API direct querying (`$client->request()`)
 - [x] Result/error handling
 - [x] Station entity (`OpenPublicMedia\PbsStationManager\Entity\Station`)
 - [x] Station getters.

### v2

- [x] PHP 8 support
