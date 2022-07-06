<?php

namespace Kriosmane\SvgDownloader\Commands;

use Illuminate\Console\Command;

class SvgDownloaderCommand extends Command
{
    public $signature = 'svg-downloader';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
