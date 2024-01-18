<?php

namespace Domains\Contact\Actions;

use Domains\Contact\Contracts\ValueObjectContract;

use App\Models\Contact;

final class UpdateContact
{
    public static function handel(ValueObjectContract $object, $uuid)
    {
        $contact = $object->toArray();
        return  Contact::whereUuid($uuid)->update($contact);
    }
}
