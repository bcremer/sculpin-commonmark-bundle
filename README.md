# Sculpin CommonMark Bundle

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Latest Version](https://img.shields.io/packagist/v/bcremer/sculpin-commonmark-bundle.svg?style=flat-square)](https://packagist.org/packages/bcremer/sculpin-commonmark-bundle)

[Sculpin](http://sculpin.io) bundle that integrates the [league/commonmark](https://github.com/thephpleague/commonmark) markdown parser.

## Installation

* Add the following to your `sculpin.json` file:

```json
{
    "require": {
        "bcremer/sculpin-commonmark-bundle": "~0.2"
    }
}
```

* Run `sculpin update`.
* Add the bundle to your kernel `app/SculpinKernel.php`:

```php
<?php

class SculpinKernel extends \Sculpin\Bundle\SculpinBundle\HttpKernel\AbstractKernel
{
    protected function getAdditionalSculpinBundles()
    {
        return array(
            'Bcremer\Sculpin\Bundle\CommonMarkBundle\SculpinCommonMarkBundle'
        );
    }
}
```

## Extensibility
This bundle provides access to the low level component of the `league/commonmark` package.
For more information about `league/commonmark` customization please see [Advanced Usage & Customization](https://github.com/thephpleague/commonmark#advanced-usage--customization) and
[Community Extensions](https://github.com/thephpleague/commonmark#community-extensions).

### Defined services
This bundle defines the following services in the sculpin DI Container:

* `sculpin_commonmark.environment`
* `sculpin_commonmark.docparser`
* `sculpin_commonmark.htmlrenderer`
* `sculpin_commonmark.league_converter`
* `sculpin_commonmark.converter`
* `sculpin_commonmark.event.commonmark`

### Defined DI Tags
This bundle handles the following [Dependency Injection Tags](http://symfony.com/doc/current/components/dependency_injection/tags.html):

* `sculpin_commonmark.extension`: To add a implementation of [`League\CommonMark\Extension\ExtensionInterface`](https://github.com/thephpleague/commonmark/blob/master/src/Extension/ExtensionInterface.php) to the
[`League\CommonMark\Environment`](https://github.com/thephpleague/commonmark/blob/master/src/Environment.php).

### Example

To add the [CommonMark Table Extension](https://github.com/webuni/commonmark-table-extension) add the following to your `app/config/sculpin_services.yml`:

```yml
# app/config/sculpin_services.yml
services:
    webuni.commonmark.tablextension:
        class: Webuni\CommonMark\TableExtension\TableExtension
        tags:
            - { name: sculpin_commonmark.extension }
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
