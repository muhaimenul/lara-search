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

class SearchService
{
    protected $searchType;

    public function __construct()
    {
        $this->searchType = !empty(config('larasearch:formula')) ? config('larasearch:formula') : 'fts';
    }

    public function search ($q, $term, $searchable) {
        $searchType = !empty(config('larasearch:formula')) ? config('larasearch:formula') : 'fts';
        dd(config('larasearch:formula'));
        if($searchType == 'fts') $searchObj = new FulltextSearch();
//        else if($searchType == 'elastic') $searchObj = new LikeSearch();
        else $searchObj = new LikeSearch();
//        ($searchType == 'like')
        $searchObj->search($q, $term, $searchable);
    }
}