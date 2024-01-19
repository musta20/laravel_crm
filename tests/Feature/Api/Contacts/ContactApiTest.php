<?php

declare(strict_types=1);

use App\Models\Contact;
use Illuminate\Testing\Fluent\AssertableJson;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;
use symfony\component\HttpFoundation\Response;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

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
            ->where('title', $contact->title)->etc()

    );
});

it('can create new contact', function (string $string) {
    auth()->loginUsingId(App\Models\User::factory()->create()->id);
    $rowCount = EloquentStoredEvent::query()->count();
    //Contact::query()->count();

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
    )->assertStatus(Response::HTTP_CREATED);
    // ->assertJson(
    //     fn (AssertableJson $json) =>
    //     $json->where('name.first_name', $string)
    //         ->where('type', 'contact')->etc()
    //     );

    expect(EloquentStoredEvent::query()->count())->toEqual($rowCount + 1);
    //expect(Contact::query()->count())->toEqual($rowCount + 1);
})->with(data: 'strings');


it('can update contact', function (string $string) {
    auth()->loginUsingId(App\Models\User::factory()->create()->id);
    $contact = Contact::first();

    putJson(
        uri: route(name: 'api:contacts:update', parameters: [$contact->uuid]),
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
    )->assertStatus(Response::HTTP_OK);

    expect($contact->refresh())->first_name->toEqual($string);
     
})->with(data: 'strings');


it('its return 404 when trying to update contact with worng uuid',
    function (string $string) {
        auth()->loginUsingId(App\Models\User::factory()->create()->id);

        putJson(
            uri: route(name: 'api:contacts:update', parameters: ['uuid' => 0]),
            data:  [
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
        )->assertStatus(Response::HTTP_NOT_FOUND);
    }
)->with(data:'strings');

it('its return 401 when trying to update withour authryzation',
    function () {

        putJson(
            uri: route(name: 'api:contacts:update', parameters: ['test']),
            data: []
        )->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
);


it('retrevie list of contacts ', function () {

    auth()->loginUsingId(App\Models\User::factory()->create()->id);
    Contact::factory(10)->create();

    getJson(
        uri: route(name: 'api:contacts:index')
    )->assertStatus(status: Response::HTTP_OK);
});
