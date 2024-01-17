<?php

namespace App\Http\Controllers\Api\Contacts;

use Domains\Contact\Actions\CreateNewContact;
use Domains\Contact\Factories\ContactFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contacts\StoreRequest;
use App\Http\Resources\Api\ContactResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        return new JsonResponse(
            data:  new ContactResource(CreateNewContact::handel(
                object: ContactFactory::make(
                    attributes: $request->all()
                ),
            )),
            status: Response::HTTP_CREATED,
        );
    }
}
