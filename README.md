
# SVG - Material Design Icons Downloader

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kriosmane/svg-downloader.svg?style=flat-square)](https://packagist.org/packages/kriosmane/svg-downloader)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kriosmane/svg-downloader/run-tests?label=tests)](https://github.com/kriosmane/svg-downloader/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kriosmane/svg-downloader/Check%20&%20fix%20styling?label=code%20style)](https://github.com/kriosmane/svg-downloader/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kriosmane/svg-downloader.svg?style=flat-square)](https://packagist.org/packages/kriosmane/svg-downloader)

Laravel Package to download SVG Material Design Icons by [Material Design Icons](https://materialdesignicons.com) 

*Note:* Please use the main [MaterialDesign](https://github.com/Templarian/MaterialDesign/issues) repo to report issues. This repo is for distribution of the SVG files only.



## Installation

You can install the package via composer:

```bash
composer require kriosmane/svg-downloader
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="svg-downloader-config"
```

This is the contents of the published config file:

```php
return [
  
    'remote_url' => env('MDI_SVG_ENDPOINT', 'https://cdn.jsdelivr.net/npm/@mdi/svg@6.9.96/'),

    'disk' => [

        'driver' => env('MDI_SGV_FILESYSTEM_DISK', 'local'),
        'root'   => env('MDI_SGV_FILESYSTEM_DISK_ROOT', public_path('/svg')),
    ],
];
```


## Usage
```bash
php artisan svg-downloader
php artisan svg-downloader --author=Google
php artisan svg-downloader --path="storage/mdi/svg"
```

```php
$svgDownloader = new Kriosmane\SvgDownloader();
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.



## Credits

- [Krios](https://github.com/kriosmane)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## How can I thank you?
As a programmer i need coffee to be productive, don't let my [cup](https://www.buymeacoffee.com/kriosmane) get emtpy

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!
