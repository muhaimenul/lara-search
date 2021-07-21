<?php

namespace Muhaimenul\Larasearch\Tests\Feature;

use Muhaimenul\Larasearch\Tests\Searchables\User;
use Muhaimenul\Larasearch\Tests\TestCase;
use Config;
use Exception;


class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_search()
    {

        $queryString = 'demo';

        $users = User::search($queryString)->get();

        $this->assertGreaterThan(
            1,
            $users->count(),
            "actual value is not greater than expected"
        );

        $this->assertCount(
            4,
            $users->toArray(),
            "users doesn't contains 4 elements"
        );

    }

    /** @test */
    public function it_throws_an_exception_when_given_search_type_does_not_exist()
    {
        Config::set('larasearch.formula', 'xyz');

        $this->expectException(Exception::class);

        User::search('query-string');
    }
}
