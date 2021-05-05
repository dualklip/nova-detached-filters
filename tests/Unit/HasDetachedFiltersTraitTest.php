<?php

namespace Dualklip\NovaDetachedFilters\Tests\Unit;

use Laravel\Nova\Http\Requests\NovaRequest;
use Dualklip\NovaDetachedFilters\Tests\Fixtures\User;
use Dualklip\NovaDetachedFilters\Tests\Fixtures\UserResource;
use Dualklip\NovaDetachedFilters\Tests\Fixtures\UserWithDetachedColumn;
use Dualklip\NovaDetachedFilters\Tests\TestCase;

class HasDetachedFiltersTraitTest extends TestCase
{
    public function test_detached_filters_are_available()
    {
        $user = new User;
        $resource = new UserResource($user);
        $request = NovaRequest::create('/');

        $this->assertCount(2, $resource->availableFilters($request));
    }

    public function test_detached_column_filters_are_available()
    {
        $user = new User;
        $resource = new UserWithDetachedColumn($user);
        $request = NovaRequest::create('/');

        $this->assertCount(3, $resource->availableFilters($request));
    }
}
