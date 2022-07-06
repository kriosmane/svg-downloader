<?php

namespace Kriosmane\SvgDownloader\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kriosmane\SvgDownloader\SvgDownloaderServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Kriosmane\\SvgDownloader\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            SvgDownloaderServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_svg-downloader_table.php.stub';
        $migration->up();
        */
    }
}
