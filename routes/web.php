<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    $object = YamlFrontMatter::parseFile(resource_path("posts/fourthPost.html"));
    ddd($object->matter('title'));

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
