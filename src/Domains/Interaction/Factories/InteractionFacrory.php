<?php

namespace Domains\Interaction\Factories;

use Domains\Interaction\ValueObjects\InteractionValueObject;

final class InteractionFacrory
{
    public static function make(array $attributes)
    {
        return new InteractionValueObject(
            type:$attributes['type'],
            user:$attributes['user'],
            content:$attributes['content'] ?? null,
            contact:$attributes['contact'] ,
            project:$attributes['project'] ?? null,
        );
    }
}

?>