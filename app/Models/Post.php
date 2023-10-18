<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug) {

        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        $storeCacheSeconds = 1200;

        return cache()->remember("posts.{$slug}", $storeCacheSeconds , fn() => file_get_contents($path));

    }

    public static function all() {

        $files = File::files(resource_path("posts/"));

        return array_map(fn ($file) => $file->getContents(), $files);
    }
}
