<?php

use App\Models\Contact;
use App\Models\Interaction;
use App\Models\User;
use Domains\Interaction\Enums\InteractionType;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

it(' can get a list of interactions', function () {

    $user = User::factory()->create();

    auth()->login($user);

    Interaction::factory(10)->create(
        [
            'user_id' => $user->id
        ]
    );
    getJson(uri: route('api:interaction:index'))->assertStatus(
        status: Response::HTTP_OK
    );
});

it('can create a new interaction', function (string $string) {

    auth()->login(User::factory()->create());

    postJson(uri: route('api:interaction:store'), data: [
        'type' => InteractionType::MEETING,
        'contact' => Contact::factory()->create()->id,
        'content' => $string
    ])->assertStatus(status: Response::HTTP_CREATED);
})->with(data: 'strings');
