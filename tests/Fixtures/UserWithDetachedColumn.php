<?php

namespace Dualklip\NovaDetachedFilters\Tests\Fixtures;

use Illuminate\Http\Request;
use Dualklip\NovaDetachedFilters\DetachedFilterColumn;
use Dualklip\NovaDetachedFilters\NovaDetachedFilters;

class UserWithDetachedColumn extends UserResource
{
    public function cards(Request $request)
    {
        return [
            NovaDetachedFilters::make([
                FirstFilter::make(),
                DetachedFilterColumn::make([
                    ThirdFilter::make(),
                ]),
            ]),
        ];
    }
}
