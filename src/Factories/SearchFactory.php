<?php
/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 2/11/2019
 * Time: 11:19 PM
 */

namespace Muhaimenul\Larasearch\Factories;
use Exception;

class SearchFactory
{
    protected $classNameSpace = 'Muhaimenul\Larasearch\Strategies';
    public function __construct() {
        //
    }

    public static function build ($type = '') {
        if($type == '') {
            throw new Exception('Invalid Search Type.');
        } else {

            $className = 'Muhaimenul\Larasearch\Strategies\\'.ucfirst($type).'Search';

            // Assuming Class files are already loaded using autoload concept
            if(class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('Invalid Search Type.');
            }
        }
    }
}