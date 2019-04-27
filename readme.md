<h1 align="center">
<img src="https://img.icons8.com/color/48/000000/search.png" align="center" >LaraSearch
</h1>
<!--  𝕷𝖆𝖗𝖆𝕾𝖊𝖆𝖗𝖈𝖍
<p align="center"></p>  -->

## About LaraSearch (Laravel Search)

LaraSearch (Laravel Search) is a Laravel package that adds various searching functionalities to Eloquent Models. This package makes it easy to get structured search from a variety of sources and provides varieties of configurations and options to select for searching, such as: 

- [Simple search](#).
- [MySQL Full-text search](#).
- Elastic like search (Future Improvement). 

## Installation

You can install the package via composer:
```bash
composer require muhaimenul/lara-search
```

## Usage
### Preaparing your models
Add the ```LaraSearch``` trait to your model and ```$searchable``` columns as your search rules.
```php
use Muhaimenul\Larasearch\Traits\LaraSearch;

class User extends Model
{
    use LaraSearch;

    /**
     * Columns that are considered for search results.
     *
     * @var array
     */
    protected $searchable = [
        'first_name', 'last_name', 'email'
    ];
}
```
### Searching models
With the models prepared you can search them like this:
```php
// Simple search
$users = User::search($query)->get();

// Search and get relations
// It will not get the relations if you don't do this
$users = User::search($query)
            ->with('posts')
            ->get();
```

#### Search like default queries
This Search methos is compatable with any eloquent methods and Paginatation like laravel default queries. Such as,
```php
// Search with relations and pagination
$users = User::search($query)
            ->with('posts')
            ->paginate(20);
            
// Search only active users check
$users = User::where('status', 'active')
            ->search($query)
            ->paginate(20);
```
## Simple Search
## Using LaraSearch

## Simple Search

## Full-text Search

## Contributing

[Muhaimenul Islam](https://github.com/muhaimenul)
<!-- Thank you for considering contributing to the package! The contribution guide can be found in the [Documentation](#). -->

## Security Vulnerabilities

If you discover a security vulnerability or bugs within LaraSearch, please send an e-mail to Muhaimenul Islam via [i.muhaimen@gmail.com](mailto:i.muhaimen@gmail.com).

## License

The LaraSearch package is open-sourced project licensed under the [MIT license](https://opensource.org/licenses/MIT).
