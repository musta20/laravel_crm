<?php

use Domains\Contact\Actions\CreateNewContact;
use Domains\Contact\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Model;

it('cant create a new contact',function(string $string){
    
    expect(
        CreateNewContact::handel(
            object: ContactFactory::make([
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
            ]),
        ),
    )->toBeInstanceOf(Model::class)
    ->phone->toEqual($string);


})->with(data: 'strings');



?>