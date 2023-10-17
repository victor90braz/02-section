<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post {


    public static function find($slug) {

        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        $storeCacheSeconds = 1200;

        return cache()->remember("posts.{$slug}", $storeCacheSeconds , fn() => file_get_contents($path));

    }
}
