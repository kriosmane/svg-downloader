<?php

namespace Kriosmane\SvgDownloader;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
    protected $root = '';

    /**
     *
     */
    protected $total = 0;

    /**
     *
     */
    public function __construct($disk = [])
    {
        $this->_init($disk);
    }

    /**
     *
     */
    protected function _init($disk = [])
    {
        
        $this->remote_url = config('svg-downloader.remote_url');

        $driver = config('svg-downloader.disk.driver');
        $root   = config('svg-downloader.disk.root');

        if (! empty($disk)) {
            if (isset($disk['driver'])) {
                $driver = $disk['driver'];
            }

            if (isset($disk['root'])) {
                $root = $disk['root'];
            }
        }

        $this->storage = Storage::build([
            'driver' => $driver,
            'root' => $root,
        ]);

        $this->root = $root;
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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * 
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     *
     */
    public function fetchIcons()
    {
        $icons = $this->fetchAll();

        $this->icons = collect();

        foreach ($icons as $icon) {
            $this->icons->add(new Icon($icon, $this->remote_url.'svg/', $this->storage));
        }

        $this->total = count($this->icons);
    }

    /**
     *
     */
    public function filter($key, $value)
    {
        $this->icons = $this->icons->filter(function ($item, $index) use ($key, $value) {
            return $item->$key == $value;
        });

        $this->total = count($this->icons);
    }

    /**
     *
     */
    public function downloadIcons(array $filters = [])
    {
        $icons = $this->fetchAll();

        if ($icons) {
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
