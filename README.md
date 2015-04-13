# Sculpin CommonMark Bundle

[Sculpin](http://sculpin.io) bundle that integrates the [league/commonmark](https://github.com/thephpleague/commonmark) markdown parser.

## Installation

* Add the following to your `sculpin.json` file:

```json
{
    "require": {
        "bcremer/sculpin-commonmark-bundle": "dev-master"
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

## Defined services
This bundle defines the following services in the sculpin DI Container:

* `sculpin_commonmark.environment`
* `sculpin_commonmark.docparser` 
* `sculpin_commonmark.htmlrenderer`
* `sculpin_commonmark.converter`
* `sculpin_commonmark.event.commonmark`

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
