<?php

namespace Kriosmane\SvgDownloader\Commands;

use Illuminate\Console\Command;
use Kriosmane\SvgDownloader\SvgDownloader;

class SvgDownloaderCommand extends Command
{
    public $signature = 'svg-downloader {--A|author= : Filter by author}';

    protected $description = 'SVG - Material Design Icons';

    public function handle(): int
    {
        $svg = new SvgDownloader();

        $svg->fetchIcons();

        /**
         *
         */
        if ($this->option('author')) {
            $svg->filter('author', $this->option('author'));
        }


        foreach ($svg->getIcons() as $icon) {
            $icon->save();
        }

        return self::SUCCESS;
    }
}
