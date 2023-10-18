# installation

    composer create-project laravel/laravel app-example

# command terminal

    php artisan serve

# spatie/yaml-front-matter

composer require spatie/yaml-front-matter

# cache()->rememberForever

    public static function all() {

        return cache()->rememberForever('posts.all', function () {
            $files = File::files(resource_path("posts"));

            return collect($files)->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            })->sortByDesc('date');
        });
    }

# run terminal

php artisan thinker

-   yes
-   cache('posts.all')
