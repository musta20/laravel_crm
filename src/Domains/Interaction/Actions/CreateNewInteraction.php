<?php

namespace Domains\Interaction\Actions;

use Domains\Interaction\Contracts\ValueObjectContract;

use App\Models\Interaction;


final class CreateNewInteraction
{
    public static function handel(ValueObjectContract $object)
    {

        return Interaction::query()->create(
            attributes: $object->toArray(),
        );

    }
}

?>