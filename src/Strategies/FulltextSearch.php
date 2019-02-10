<?php

/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 1/21/2019
 * Time: 11:15 PM
 */
namespace Muhaimenul\Larasearch\Strategies;


class FulltextSearch implements SearchStrategy
{
    /**
     * Replaces spaces with full text search wildcards
     *
     * @param string $term
     * @return string
     */
    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if(strlen($word) >= 3) {
                $words[$key] = '+' . $word . '*';
            }
        }

        $searchTerm = implode( ' ', $words);

        return $searchTerm;
    }

    public function search($query, $term, $searchable)
    {
        // TODO: Implement search() method.
//        $columns = implode(',',$this->searchable);
        $columns = implode(',',$searchable);

        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)" , $this->fullTextWildcards($term));

        return $query;
    }
}