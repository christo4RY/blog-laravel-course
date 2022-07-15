<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;

    public function __construct($title, $slug, $intro, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
    }
    public static function all()
    {
        $files = File::files(resource_path('blog'));
        return collect($files)->map(function ($file) {
            $obj = YamlFrontMatter::parse(file_get_contents($file));
            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        });
    }
    public static function find($slug)
    {
        return static::all()->firstWhere('slug',$slug);
    }
}
