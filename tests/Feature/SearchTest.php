<?php

namespace Muhaimenul\Larasearch\Tests\Feature;

use Muhaimenul\Larasearch\Tests\Searchables\User;
use Muhaimenul\Larasearch\Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_search()
    {

        $query = 'demo';

        $users = User::search($query)->get();

        $this->assertCount(
            4,
            $users->toArray(), "users doesn't contains 4 elements"
        );

//        $this->assertGreaterThan(
//            4,
//            $users->count(),
//            "actual value is not greater than expected"
//        );
    }
}
