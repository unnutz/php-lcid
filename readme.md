# PHP-LCID

![Travis-CI](https://travis-ci.org/unnutz/php-lcid.svg)

This is a simple library that allows you to build correct LCID (Language Code Identifier) based on language, region, script values or locale.

## Installation

Add `"unnutz/php-lcid": "~1"` to your composer.json

Run `composer update`

### Laravel 4.2

Add `Unnutz\PhpLcid\PhpLcidServiceProvider::class` to your application's configuration file under providers section

In case you want to use built-in facade then add `'Lcid' => 'Unnutz\PhpLcid\Facades\LcidLaravel'` to your application's configuration file under aliases section

Run `artisan dump-autoload`

## Usage

### Laravel 4.2

#### Facade

Get LCID based on language, region, script, variant and sort combination

```php
Lcid::get($language, $region = null, $script = null, $variant = null, $sort = \Unnutz\PhpLcid\Enums\Sort::SORT_DEFAULT);
```

Get LCID based on locale and sort combination

```php
Lcid::getByLocale($locale, $sort = \Unnutz\PhpLcid\Enums\Sort::SORT_DEFAULT);
```

Get locale based on LCID

```php
Lcid::findLocale($lcid, $returnArray = false)
```

#### IoC

In class constructor assign type hint like:

```php
function __construct(LcidInterface $lcid)
{
    $this->lcid = $lcid;
}

```

All methods listed previously are available for you from now on.

### Standalone

You can use either facade `Unnutz\PhpLcid\Facades\LcidFacade` or class instance

```php
$lcid = new \Unnutz\PhpLcid\Lcid;
```

All methods listed previously are available for you.

## License

The MIT License (MIT)

Copyright (c) 2015 Artyom Sokolov

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.