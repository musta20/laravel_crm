<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
      //  return Contact::paginate(10);
        $contacts = QueryBuilder::for(
            subject: Contact::class
        )->paginate(10);
       ///  return $contacts;
        return new JsonResponse(
            data: ContactResource::collection($contacts),
            status: Response::HTTP_OK,
        );
    }
}
