<?php
// config for Kriosmane/SvgDownloader
return [

    /**
     * 
     */
    'remote_url' => env('MDI_SVG_ENDPOINT', 'https://cdn.jsdelivr.net/npm/@mdi/svg@6.9.96/'),

    /**
     * 
     */
    'disk' => [

        'driver' => env('MDI_SGV_FILESYSTEM_DISK', 'local'),
        'root'   => env('MDI_SGV_FILESYSTEM_DISK_ROOT', public_path('/svg')),
    ],
   

];
