Sure, here's an updated README with the information you provided:

---

# Installation

To create a new Laravel project named "app-example," run the following command:

```bash
composer create-project laravel/laravel app-example
```

# Running the Application

To start the development server, use the following command:

```bash
php artisan serve
```

# spatie/yaml-front-matter

To install the `spatie/yaml-front-matter` package, run the following command:

```bash
composer require spatie/yaml-front-matter
```

# Caching Posts Data

To cache the posts data and improve performance, we use Laravel's caching feature.

```php
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
```

# Using Artisan Tinker

You can use Artisan Tinker to interact with your application through the command line.

```bash
php artisan tinker
```

When prompted with `Do you really wish to run this command? (yes/no) [no]:`, enter `yes`.

## Available Commands

-   `cache('posts.all')`: Retrieve the cached posts data.
-   `cache()->forget('posts.all')`: Forget (delete) the cached posts data.
-   `cache()->get('posts.all')`: Get the cached posts data.

Example:

```php
> cache()->put('foo', 'bar');
> // or
> cache(['foo' => 'bar']);
> = true
> // or
> cache(['foo' => 'bar'], now()->addSeconds(3));

> cache('foo')
> = "bar"
```
