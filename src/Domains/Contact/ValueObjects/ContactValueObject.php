<?php

namespace  Domains\Contact\ValueObjects;

use Domains\Contact\Contracts\ValueObjectContract;

final class ContactValueObject implements ValueObjectContract
{
    public function __construct(
        public null|string $title,
        public string $firstName,
        public null|string $middleName,
        public null|string $lastName,
        public null|string $preferred,
        public null|string $phone,
        public null|string $email

    ) {
    }


    public function toArray():array
    {
        return [

            'title'=>$this->title,
            'first_name'=>$this->firstName,
            'middle_name'=>$this->middleName,
            'last_name'=>$this->lastName,
            'preferred_name'=>$this->preferred,
            'phone'=>$this->phone,
            'email'=>$this->email,
        ];
    }
}
