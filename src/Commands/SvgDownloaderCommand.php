<?php

namespace Kriosmane\SvgDownloader\Commands;

use Illuminate\Console\Command;
use Kriosmane\SvgDownloader\SvgDownloader;

class SvgDownloaderCommand extends Command
{
    public $signature = 'svg-downloader';

    public $description = 'My command';

    public function handle(): int
    {
        $svg = new SvgDownloader();

        $svg->fetchIcons();

        $svg->filter('author', 'Google');

        foreach ($svg->getIcons() as $icon) {
            $icon->save();
        }

        return self::SUCCESS;
    }
}
