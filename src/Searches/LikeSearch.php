<?php

/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 1/21/2019
 * Time: 11:15 PM
 */

namespace Muhaimenul\Larasearch\Searches;

class LikeSearch implements SearchStrategy
{
    public function search($query, $term, $searchable)
    {
        $query->where($searchable[0], 'Like', '%' . $term . '%');
        $length = count($searchable);

        if ($length > 1) {
            for ($i = 1; $i < $length; $i++) {
                $query->orWhere($searchable[$i], 'Like', '%' . $term . '%');
            }
        }

        return $query;
    }
}
