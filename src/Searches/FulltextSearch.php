<?php

/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 1/21/2019
 * Time: 11:15 PM
 */
namespace Muhaimenul\Larasearch\Searches;


class FulltextSearch implements SearchStrategy
{
    protected $mysqlReservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
    /**
     * Replaces spaces with full text search wildcards
     *
     * @param string $term
     * @return string
     */
    protected function filterFullTextWildcards($term)
    {
        // removing MySQL reserved symbols from search term
        $term = str_replace($this->mysqlReservedSymbols, '', $term);
        $words = explode(' ', $term);

        foreach($words as $key => $word) {
            if(strlen($word) > 2) {
                $words[$key] = '+' . $word . '*';
            }
        }

        $searchTerm = implode( ' ', $words);

        return $searchTerm;
    }

    public function search($query, $term, $searchable)
    {
        $columns = implode(',',$searchable);
        // other full-text searching mode will be used
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)" , $this->filterFullTextWildcards($term));

        return $query;
    }
}