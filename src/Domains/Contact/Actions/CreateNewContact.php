<?php

namespace Domains\Contact\Actions;

use Domains\Contact\Contracts\ValueObjectContract;

use App\Models\Contact;


final class CreateNewContact
{
    public static function handel(ValueObjectContract $object)
    {

        return Contact::query()->create(
            attributes: $object->toArray(),
        );

    }
}

?>