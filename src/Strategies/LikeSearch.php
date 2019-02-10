<?php

/**
 * Created by PhpStorm.
 * User: Muhaimenul Islam
 * Date: 1/21/2019
 * Time: 11:15 PM
 */
namespace Muhaimenul\Larasearch\Strategies;

class LikeSearch implements SearchStrategy
{
    public function search($query, $term, $searchable)
    {
        // TODO: Implement search() method.

        $query->where($searchable[0], 'Like', '%'.$term.'%');
        $len = count($searchable);
        if($len)
        {
            for($i = 1; $i < $len; $i++)
            {
                $query->orWhere($searchable[$i], 'Like', '%'.$term.'%');
            }
        }
//        $query->where(1,1);
//        foreach ($searchable as $searchCol) {
//            $query->orWhere($searchCol, 'Like', '%'.$term.'%');
//        }
        return $query;
    }
}