<?php

namespace Kriosmane\SvgDownloader;

use Kriosmane\SvgDownloader\Commands\SvgDownloaderCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SvgDownloaderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('svg-downloader')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_svg-downloader_table')
            ->hasCommand(SvgDownloaderCommand::class);
    }
}
