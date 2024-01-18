<?php

use App\Models\Contact;
use Domains\Contact\Events\ContactWasCreated;
use Domains\Contact\Factories\ContactFactory;
use Domains\Contact\Handlers\ContactHandler;

it(
    'can store new contact',
    function (string $string) {
        $event = new ContactWasCreated(
            object: ContactFactory::make(
                [
                    'title' => $string,
                    'name' => [
                        'first' => $string,
                        'middle' => $string,
                        'last' => $string,
                        'preferred' => $string,
                        'full' => "$string $string $string",
                    ],
                    'phone' => $string,
                    'email' => "{$string}@email.com"
                ]
            ),

        );


        expect($event)->toBeInstanceOf(ContactWasCreated::class);

        $rowCount = Contact::query()->count();
        
        (new ContactHandler())->onContactWasCreated($event);
        
        expect(Contact::query()->count())->toEqual($rowCount + 1);
    }









)->with(data: 'strings');
