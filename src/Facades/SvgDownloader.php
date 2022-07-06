<?php

namespace Kriosmane\SvgDownloader\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kriosmane\SvgDownloader\SvgDownloader
 */
class SvgDownloader extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'svg-downloader';
    }
}
