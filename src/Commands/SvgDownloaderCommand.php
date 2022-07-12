<?php

namespace Kriosmane\SvgDownloader\Commands;

use Illuminate\Console\Command;
use Kriosmane\SvgDownloader\SvgDownloader;

class SvgDownloaderCommand extends Command
{
    public $signature = 'svg-downloader 
                                    {--A|author= : Filter by author}
                                    {--P|path= : Destination path relative to base_path}';

    protected $description = 'SVG - Material Design Icons';

    public function handle(): int
    {

        $disk = [];

        /**
         * 
         */
        if($this->option('path'))
        {
            $path = $this->option('path');

            $disk['driver'] = 'local';
            $disk['root'] = base_path($path);

        }


        $svg = new SvgDownloader($disk);

        $svg->fetchIcons();

        /**
         * 
         */
        if($this->option('author'))
        {
            $svg->filter('author', $this->option('author'));
        }

        
        $this->info(sprintf('Fetched %d svg icons', $svg->getTotal()));
        $this->info(sprintf('Icons will be stored in %s', $svg->getRoot()));

        if ($this->confirm('Do you wish to continue?', true)) {

            $bar = $this->output->createProgressBar($svg->getTotal());

            $bar->start();
    
    
            foreach ($svg->getIcons() as $icon) {
    
                $icon->save();
    
                $bar->advance();
            }
    
            $bar->finish();
    
            return self::SUCCESS;
        }

        return self::SUCCESS;
    }
}
