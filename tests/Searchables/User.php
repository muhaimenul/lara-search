<?php
/**
 * Created by Muhaimenul Islam.
 * User: muhaimenul
 * Date: 7/21/21
 * Time: 2:24 AM
 */


namespace Muhaimenul\Larasearch\Tests\Searchables;


use Illuminate\Database\Eloquent\Model;
use Muhaimenul\Larasearch\Traits\LaraSearch;

class User extends Model
{
    use LaraSearch;

    protected $fillable = ['email'];

    public $timestamps = false;

    protected $table = 'users';
}
