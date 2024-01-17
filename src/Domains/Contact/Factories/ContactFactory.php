<?php

namespace  Domains\Contact\Factories;

use Domains\Contact\ValueObjects\ContactValueObject;


final class ContactFactory
{
    public static function make(array $attributes)
    {

        return new ContactValueObject(
            title: strval(data_get($attributes,key:'title')),
            firstName: strval(data_get($attributes,key:'name.first')),
            middleName: strval(data_get($attributes,key:'name.middle')),
            lastName: strval(data_get($attributes,key:'name.last')),
            preferred: strval(data_get($attributes,key:'name.preferred')),
            phone: strval(data_get($attributes,key:'phone')),
            email: strval(data_get($attributes,key:'email')),
        );
    }
}
