![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-types/master/arts/3x1io-tomato-types.jpg)

# Filament Types

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-types/version.svg)](https://packagist.org/packages/tomatophp/filament-types)
[![PHP Version Require](http://poser.pugx.org/tomatophp/filament-types/require/php)](https://packagist.org/packages/tomatophp/filament-types)
[![License](https://poser.pugx.org/tomatophp/filament-types/license.svg)](https://packagist.org/packages/tomatophp/filament-types)
[![Downloads](https://poser.pugx.org/tomatophp/filament-types/d/total.svg)](https://packagist.org/packages/tomatophp/filament-types)

Manage any type on your app in Database with easy to use Resource for FilamentPHP

## Screenshots

![Types](https://raw.githubusercontent.com/tomatophp/filament-types/master/arts/types.png)
![Filters](https://raw.githubusercontent.com/tomatophp/filament-types/master/arts/filters.png)
![Type Col](https://raw.githubusercontent.com/tomatophp/filament-types/master/arts/type-col.png)
![Form](https://raw.githubusercontent.com/tomatophp/filament-types/master/arts/form.png)

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

## Register New Type

you can add new type using config file `config/filament-types.php` or you can register a type from your provider using our Facade

```php
use TomatoPHP\FilamentTypes\Facades\FilamentTypes;

FilamentTypes::register([
    'types',
    'groups'
], 'accounts');
```

## Use Type Helper

you can access types from anywhere by using type helper function

```php
type_of($key);
```

i will return type object

## Use Type Column

you can use type column in your table like this

```php
use TomatoPHP\FilamentTypes\Components\TypeColumn;

TypeColumn::make('type')->searchable(),
```

## Auto Caching 

on your `.env` add this

```.env
CACHE_STORE=array
MODEL_CACHE_STORE=array
```

supported cache stores are

```php
+ Redis
+ MemCached
+ APC
+ Array
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

## Other Filament Packages

- [Filament Users](https://www.github.com/tomatophp/filament-users)
- [Filament Translations](https://www.github.com/tomatophp/filament-translations)
- [Filament Settings Hub](https://www.github.com/tomatophp/filament-settings-hub)
- [Filament Alerts Sender](https://www.github.com/tomatophp/filament-alerts)
- [Filament Accounts Builder](https://www.github.com/tomatophp/filament-accounts)
- [Filament Wallet Manager](https://www.github.com/tomatophp/filament-wallet)
- [Filament Artisan Runner](https://www.github.com/tomatophp/filament-artisan)
- [Filament File Browser](https://www.github.com/tomatophp/filament-browser)
- [Filament Developer Gate](https://www.github.com/tomatophp/filament-developer-gate)
- [Filament Locations Seeder](https://www.github.com/tomatophp/filament-locations)
- [Filament Plugins Manager](https://www.github.com/tomatophp/filament-plugins)
- [Filament Splade Integration](https://www.github.com/tomatophp/filament-splade)
- [Filament Menus Generator](https://www.github.com/tomatophp/filament-menus)
- [Filament Icons Picker](https://www.github.com/tomatophp/filament-icons)
- [Filament Helpers Classes](https://www.github.com/tomatophp/filament-helpers)


## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/filament/filament-types)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

Please see [SECURITY](SECURITY.md) for more information about security.

## Credits

- [Fady Mondy](https://wa.me/+201207860084)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
