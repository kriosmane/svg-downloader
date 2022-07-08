<?php

namespace Kriosmane\SvgDownloader;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use Kriosmane\SvgDownloader\Icon;

/**
 * 
 */
class SvgDownloader
{

    /**
     * 
     */
    protected $remote_url = '';

    /**
     * 
     */
    protected $meta = 'meta.json';

    /**
     * 
     */
    protected $storage = null;

    /**
     * 
     */
    protected $icons = null;

    /**
     * 
     */

    /**
     * 
     */
    public function __construct()
    {
        $this->_init();
    }

    /**
     * 
     */
    protected function _init(Array $disk = [])
    {
        $this->remote_url = config('svg-downloader.remote_url');

        $driver = config('svg-downloader.disk.driver');
        $root = config('svg-downloader.disk.root');

        if(!empty($disk))
        {
            if(isset($disk['driver']))
            {
                $driver = $disk['driver'];
            }

            if(isset($disk['root']))
            {
                $root = $disk['root'];
            }
        }

        $this->storage = Storage::build([
            'driver' => $driver,
            'root' => $root,
        ]);

    }


    /**
     * 
     */
    public function getIcons()
    {
        return $this->icons;
    }

    /**
     * 
     */
    public function fetchIcons()
    {
        $icons = $this->fetchAll();

        $this->icons = collect();

        foreach($icons as $icon)
        {
            $this->icons->add(new Icon($icon, $this->remote_url.'svg/', $this->storage));
        }
        
    }

    /**
     * 
     */
    public function filter($key, $value)
    {
        $this->icons = $this->icons->filter(function ($item, $index) use ($key, $value) {
            return $item->$key == $value;
        });

    }

    /**
     * 
     */
    public function downloadIcons(Array $filters = [])
    {

        $icons = $this->fetchAll();

        if($icons)
        {
            
        }
        
    }

    /**
     * 
     */
    private function fetchAll()
    {
        $response = Http::get($this->remote_url.$this->meta);

        if ($response->successful()) {

            return $response->json();
        }

        return null;
    }



}
