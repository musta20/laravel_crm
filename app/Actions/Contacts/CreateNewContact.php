<?php
namespace App\Actions\Contacts;

use App\Contracts\ValueObjectContract;
use App\Models\Contact;

final class CreateNewContact
{
    public static function handel(ValueObjectContract $object)
    {
//dd($object->toArray());
        return Contact::query()->create(
            attributes: $object->toArray(),
        );

    }
}

?>