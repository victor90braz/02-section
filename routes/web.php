<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {

    $files = File::files(resource_path("posts"));
    $documents = [];

    foreach ($files as $file) {
        $documents[] = YamlFrontMatter::parseFile($file);
    }

    ddd($documents);

    /*
    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
    */

});

Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-Za-z_\-]+');
