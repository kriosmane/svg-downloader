<?php

namespace Kriosmane\SvgDownloader;
use Illuminate\Support\Facades\Storage;

class Icon {

    /**
     * 
     */
    public $id = '';

    /**
     * 
     */
    public $name = '';

    /**
     * 
     */
    public $codepoint = '';

    /**
     * 
     */
    public $aliases = [];


    /**
     * 
     */
    public $tags = [];


    /**
     * 
     */
    public $author = '';


    /**
     * 
     */
    public $version = '';

    /**
     * 
     */
    protected $extension = '.svg';


    /**
     * 
     */
    protected $endpoint = '';

    /**
     * 
     */
    protected $storage;


    /**
     * 
     */
    public function __construct($data = [], $endpoint = '', $storage = null)
    {
        if(isset($data['id'])) $this->id = $data['id']; 
        
        if(isset($data['name'])) $this->name = $data['name']; 

        if(isset($data['codepoint'])) $this->codepoint = $data['codepoint']; 

        if(isset($data['aliases'])) $this->aliases = $data['aliases']; 

        if(isset($data['tags'])) $this->tags = $data['tags']; 

        if(isset($data['author'])) $this->author = $data['author']; 

        if(isset($data['version'])) $this->version = $data['version'];

        $this->endpoint = $endpoint;

        $this->storage = $storage;
    }


    /**
     * 
     */
    public function get()
    {
    }

    /**
     * 
     * 
     */
    public function save()
    {
        $contents = file_get_contents($this->endpoint.$this->name.$this->extension);

        $this->storage->put($this->name.$this->extension, $contents);
    }




}
