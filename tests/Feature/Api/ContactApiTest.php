<?php

declare(strict_types=1);

use App\Models\Contact;
use Illuminate\Testing\Fluent\AssertableJson;
use symfony\component\HttpFoundation\Response;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;


it('it gets an unauthorized respose when not loged in ', function () {
    getJson(
        uri: route(name: 'api:contacts:index')
    )->assertStatus(status: Response::HTTP_UNAUTHORIZED);
});



it('its get an unauthorized respons when user is not loged in', function (string $string) {

    postJson(
        uri: route(name: 'api:contacts:store'),
        data: [
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
    )->assertStatus(Response::HTTP_UNAUTHORIZED);
})->with(data: 'strings');


it('can create new contact', function (string $string) {
    auth()->loginUsingId(App\Models\User::factory()->create()->id);
    $rowCount = Contact::query()->count();

    postJson(
        uri: route(name: 'api:contacts:store'),
        data: [
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
    )->assertStatus(Response::HTTP_CREATED)->assertJson(
        fn (AssertableJson $json) =>
        $json->where('name.first_name', $string)
            ->where('type', 'contact')->etc()

    );

    expect(Contact::query()->count())->toEqual($rowCount + 1);
})->with(data: 'strings');

it('retrevie list of contacts ', function () {

    auth()->loginUsingId(App\Models\User::factory()->create()->id);


    getJson(
        uri: route(name: 'api:contacts:index')
    )->assertStatus(status: Response::HTTP_OK)
        ->assertJson(fn (AssertableJson $json) =>
        $json->count(10)
            ->first(
                fn (AssertableJson $jsonItem) =>
                $jsonItem->where(key: 'type', expected: 'contact')->etc(),
            ));
});
