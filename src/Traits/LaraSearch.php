<?php
/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 2/10/2019
 * Time: 9:09 PM
 */

namespace Muhaimenul\Larasearch\Traits;

use Illuminate\Database\Eloquent\Concerns\GuardsAttributes;
use Muhaimenul\Larasearch\Services\SearchService;


trait LaraSearch
{

    /**
     * Get the searchable attributes for the model.
     *
     * @return array
     */
    public function getSearchable()
    {
        return $this->searchable;
    }

    /**
     * Set the searchable attributes for the model.
     *
     * @param  array  $searchable
     * @return $this
     */
    public function searchable(array $searchable)
    {
        $this->searchable = $searchable;

        return $this;
    }


    /**
     * Merge new searchable attributes with existing searchable attributes on the model.
     *
     * @param  array  $searchable
     * @return $this
     */
    public function mergeSearchable(array $searchable)
    {
        $this->searchable = array_merge($this->searchable, $searchable);

        return $this;
    }


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

        return $searchService->search($query, $term, $this->getSearchable());

    }
}
