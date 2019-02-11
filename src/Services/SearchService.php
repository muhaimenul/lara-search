<?php

/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 1/21/2019
 * Time: 11:17 PM
 */
namespace Muhaimenul\Larasearch\Services;
use Muhaimenul\Larasearch\Strategies\LikeSearch;
use Muhaimenul\Larasearch\Strategies\FulltextSearch;
use Illuminate\Support\Facades\Config;
use Muhaimenul\Larasearch\Factories\SearchFactory;

class SearchService
{
    protected $searchType;

    public function __construct()
    {
        $this->searchType = !empty(Config::get('larasearch.formula')) ? Config::get('larasearch.formula') : 'like';
    }

    public function search ($q, $term, $searchable) {
        $searchObj = SearchFactory::build($this->searchType);
        $searchObj->search($q, $term, $searchable);
//        if($this->searchType == 'fts') $searchObj = new FulltextSearch();
////        else if($searchType == 'elastic') $searchObj = new LikeSearch();
//        else $searchObj = new LikeSearch();
////        ($searchType == 'like')
//        $searchObj->search($q, $term, $searchable);
    }
}