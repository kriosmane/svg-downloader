<?php

namespace Kriosmane\SvgDownloader\Commands;

use Kriosmane\SvgDownloader\SvgDownloader;
use Illuminate\Console\Command;

class SvgDownloaderCommand extends Command
{
    public $signature = 'svg-downloader';

    public $description = 'My command';

    public function handle(): int
    {

        $svg =  new SvgDownloader();

        $svg->fetchIcons();

        $svg->filter('author', 'Google');

        foreach($svg->getIcons() as $icon)
        {
           $icon->save();

        }

        return self::SUCCESS;
    }
}
