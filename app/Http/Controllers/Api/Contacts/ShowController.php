<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isNull;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $contacts = Contact::whereUuid($request->uuid)->first();

        if(!$contacts) 
        {
            return new JsonResponse(
                data:[],
                status: Response::HTTP_NOT_FOUND,
            );
        } 
        

        return new JsonResponse(
            data: new ContactResource($contacts),
            status: Response::HTTP_OK,
        );
    }
}
