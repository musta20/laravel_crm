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



it('its 401 when trying tstore contatct when not authraized', function (string $string) {

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

it('its get 401 when trying retrve a contact by its uuid', function () {
    $contact = Contact::factory()->create();

    getJson(
        uri: route(name: 'api:contacts:show', parameters: [$contact->uuid]),
    )->assertStatus(status: Response::HTTP_UNAUTHORIZED);
});

it('its get 404 when uuid not found', function () {
    auth()->loginUsingId(App\Models\User::factory()->create()->id);

    getJson(
        uri: route(name: 'api:contacts:show', parameters: ['test']),
    )->assertStatus(status: Response::HTTP_NOT_FOUND);
});


it('can retrve a contact by its uuid', function () {
    $contact = Contact::factory()->create();
    auth()->loginUsingId(App\Models\User::factory()->create()->id);

    getJson(
        uri: route(name: 'api:contacts:show', parameters: [$contact->uuid]),
    )->assertStatus(status: Response::HTTP_OK)->assertJson(
        fn (AssertableJson $json) =>
        $json
            ->where('name.first_name', $contact->first_name)
            ->where('title', $contact->title)
            //->where('uuid', $contact->uuid)
            ->where('type', 'contact')->etc()

    );
});


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
