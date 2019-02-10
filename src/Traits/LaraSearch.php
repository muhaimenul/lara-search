<?php
/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 2/10/2019
 * Time: 9:09 PM
 */

namespace Muhaimenul\Larasearch\Traits;

use Muhaimenul\Larasearch\Services\SearchService;


trait LaraSearch
{
    /**
     * Scope a query that matches a full text search of term.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        $searchService = new SearchService;
        return $searchService->search($query, $term, $this->searchable);
//        $columns = implode(',',$this->searchable);

//        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)" , $this->fullTextWildcards($term));

//        return $query;
    }
}