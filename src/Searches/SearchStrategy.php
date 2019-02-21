<?php
/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 1/21/2019
 * Time: 11:09 PM
 */
namespace Muhaimenul\Larasearch\Searches;

interface SearchStrategy {
    public function search($query, $term, $searchable);
}