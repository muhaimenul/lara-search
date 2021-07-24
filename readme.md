<h1 align="center">
<img src="https://img.icons8.com/color/48/000000/search.png" align="center" >LaraSearch
</h1>

 <!-- 𝕷𝖆𝖗𝖆𝕾𝖊𝖆𝖗𝖈𝖍 -->
<!-- <p align="center"></p>  -->

[![Latest Version on Packagist](https://img.shields.io/packagist/v/muhaimenul/lara-search.svg?style=flat-square)](https://packagist.org/packages/muhaimenul/lara-search)
[![Total Downloads](https://img.shields.io/packagist/dt/muhaimenul/lara-search.svg?style=flat-square)](https://packagist.org/packages/muhaimenul/lara-search)
[![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/muhaimenul/lara-crud/master/LICENSE)
[![Awesome Laravel](https://img.shields.io/badge/Awesome-Laravel-brightgreen.svg)](https://github.com/muhaimenul/lara-search)

## About LaraSearch (Laravel Search)

LaraSearch (Laravel Search) is a Laravel package that adds various searching functionalities to Eloquent Models. This package makes it easy to get structured search from a variety of sources and provides varieties of configurations and options to select for searching, such as: 

- [Simple search](#simple)
- [MySQL Full-text search](#fts)
- Elastic like search (Future Improvement)

## Installation

You can install the package via composer:
```bash
composer require muhaimenul/lara-search
```

## <div id="usage">Usage</div>
### Preparing your models
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
// search string
$queryString = 'xyz';

// Simple search
$users = User::search($queryString)->get();

// Search and get relations
// It will not get the relations if you don't do this
$users = User::search($queryString)
            ->with('posts')
            ->get();
```

#### Search like default queries
This Search methos is compatable with any eloquent methods and Paginatation like laravel default queries. Such as,
```php
// Search with relations and pagination
$users = User::search($queryString)
            ->with('posts')
            ->paginate(20);
            
// Search only active users check
$users = User::where('status', 'active')
            ->search($queryString)
            ->paginate(20);
```

## <div id="simple">Simple Search</div>
Simple search uses eloquent WHERE and sql LIKE operator to search for a specified pattern in a column. By default, this package uses it and  No additional configuration is needed. Just follow above [instructions](#usage) to use Simple Search.

## <div id="fts">MySQL Full-text Search</div>
Full-Text Search in MySQL server lets users run full-text queries against character-based data in MySQL tables. It is a powerful features that allows searching text efficiently accross multiple columns. It provides searching functionalites like Algolia but more native to MySQL. To learn more [see here](https://www.w3resource.com/mysql/mysql-full-text-search-functions.php). From  version 4, Laravel doesn't support FULLTEXT indexes by default. So, a [full-text index](#ftindex) must be created on the table before running full-text queries on a table. 

If you want to use it, then you will have to publish to package in order to enable it from config.

## Publishing

You can publish everything at once:
```bash
php artisan vendor:publish --provider="muhaimenul\larasearch\LarasearchServiceProvider"
```
## Configuration

After publishing the package you will find, `larasearch.php` configuration file in the `config` folder.

Here, the '`formula`' is the key to determine this project's search type. Currently there are two types of configuration, '`fulltext`' (FullText Search) and '`like`' (Simple Search).

```php
// fulltext or like
    'formula' => env('LARA_SEARCH_TYPE', 'fulltext'),
```

You can directly assign formula type in `larasearch.php` or use `.env` and assign value to 'LARA_SEARCH_TYPE' alias.

By default, this package uses [Simple Search](#simple), which doesn't need any publishing or additional configuration. But to use [FullText Search](#fts), you have to publish the package and follow below configuration.

## <div id="ftindex"> Setup Full-Text Search</div>

To use Full-text search, only additional full-text index is needed. Rest of the searching process is same.
- Fulltext search can only be used with MySQL 5.6+, else the Database Engine must be set to MyISAM instead of InnoDB.
 - Then set up the migration and add the Full-Text index.

```php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
    });
 
    // Full Text Index
    DB::statement('ALTER TABLE users ADD FULLTEXT fulltext_index (first_name, last_name, email)');
}
```

NOTE: Here, `fulltext_index (first_name, last_name, email)` must have to be same as the `protected $searchable` columns / array added in the model.

Then, run the migrations.
```
php artisan migrate
```
Voalá! The setup is done. Now The powrfull fulltext search can be used easily by this package following the initial [usage](#usage).

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
<!-- Thank you for considering contributing to the package! The contribution guide can be found in the [Documentation](#). -->

## Security Vulnerabilities

If you discover a security vulnerability or bugs within LaraSearch, please send an e-mail to Muhaimenul Islam via [i.muhaimen@gmail.com](mailto:i.muhaimen@gmail.com).

## Credits

-   [Muhaimenul Islam](https://github.com/muhaimenul)

## License

The LaraSearch package is open-sourced project licensed under the [MIT license](https://opensource.org/licenses/MIT).
