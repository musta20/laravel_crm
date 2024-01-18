<?php

namespace App\Http\Controllers\Api\Contacts;

use Domains\Contact\Actions\CreateNewContact;
use Domains\Contact\Factories\ContactFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contacts\StoreRequest;
use App\Http\Resources\Api\ContactResource;
use Domains\Contact\Aggregates\ContactAggregates;
use Illuminate\Http\JsonResponse;
use Str;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        ContactAggregates::retrieve(
            uuid: Str::uuid()->toString(),
        )->createContact(
            object: ContactFactory::make(
                attributes: $request->all()
            )
        )->persist();
        return new JsonResponse(
            data: [],
            status: Response::HTTP_CREATED,
        );
    }
}
