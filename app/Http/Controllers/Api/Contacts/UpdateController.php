<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ContactResource;
use App\Models\Contact;
use Domains\Contact\Aggregates\ContactAggregates;
use Domains\Contact\Factories\ContactFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use Str;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        ContactAggregates::retrieve(
            uuid: Str::uuid()->toString(),
        )->UpdateContact(
            object: ContactFactory::make(
                attributes: $request->all()
            ),
            uuid: $request->uuid
        )->persist();

            $contact = Contact::whereUuid($request->uuid)->first();

            if(!$contact){
                return new JsonResponse(
                    data: [],
                    status: Response::HTTP_NOT_FOUND,
                );
            }
            
        return new JsonResponse(
            data: new ContactResource(Contact::whereUuid($request->uuid)->first()),
            status: Response::HTTP_OK,
        );
        
    }
}
