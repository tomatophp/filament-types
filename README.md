![Screenshot](https://github.com/tomatophp/filament-types/blob/master/arts/3x1io-tomato-types.jpg)

# Filament types

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-types/version.svg)](https://packagist.org/packages/tomatophp/filament-types)
[![PHP Version Require](http://poser.pugx.org/tomatophp/filament-types/require/php)](https://packagist.org/packages/tomatophp/filament-types)
[![License](https://poser.pugx.org/tomatophp/filament-types/license.svg)](https://packagist.org/packages/tomatophp/filament-types)
[![Downloads](https://poser.pugx.org/tomatophp/filament-types/d/total.svg)](https://packagist.org/packages/tomatophp/filament-types)

Manage any type on your app in Database with easy to use Resource for FilamentPHP

## Screenshots

![Types](https://github.com/tomatophp/filament-types/blob/master/arts/types.png)
![Filters](https://github.com/tomatophp/filament-types/blob/master/arts/filters.png)
![Form](https://github.com/tomatophp/filament-types/blob/master/arts/form.png)

## Installation

```bash
composer require tomatophp/filament-types
```
after install your package please run this command

```bash
php artisan filament-types:install
```


finally reigster the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

```php
->plugin(\TomatoPHP\FilamentTypes\FilamentTypesPlugin::make())
```

## Publish Assets

you can publish config file by use this command

```bash
php artisan vendor:publish --tag="filament-types-config"
```

you can publish views file by use this command

```bash
php artisan vendor:publish --tag="filament-types-views"
```

you can publish languages file by use this command

```bash
php artisan vendor:publish --tag="filament-types-lang"
```

you can publish migrations file by use this command

```bash
php artisan vendor:publish --tag="filament-types-migrations"
```

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/plugins/laravel-package-generator)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

Please see [SECURITY](SECURITY.md) for more information about security.

## Credits

- [Tomatophp](mailto:info@3x1.io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
