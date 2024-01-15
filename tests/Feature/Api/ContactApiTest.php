<?php

declare(strict_types=1);

use App\Models\Contact;
use Illuminate\Testing\Fluent\AssertableJson;
use symfony\component\HttpFoundation\Response;

use function Pest\Laravel\getJson;

it('retrevie list of contacts ', function () {

    auth()->loginUsingId(App\Models\User::factory()->create()->id);

  //  Contact::factory(10)->create();

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
