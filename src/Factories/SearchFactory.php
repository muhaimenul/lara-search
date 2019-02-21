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
    const CLASS_NAMESPACE = 'Muhaimenul\Larasearch\Searches\\';
    public function __construct() {
        //
    }

    public static function build ($type) {
        if($type) {
            $className = self::CLASS_NAMESPACE . ucfirst($type) . 'Search';
            if(class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('Invalid Search Type.');
            }
        } else {
            throw new Exception('Invalid Search Type.');
        }
    }
}