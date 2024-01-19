<?php

namespace App\Http\Controllers\Api\Interactions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Interaction\StoreRequest;
use App\Http\Resources\Api\InteractionResource;
use Domains\Interaction\Actions\CreateNewInteraction;
use Domains\Interaction\Factories\InteractionFacrory;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {

        CreateNewInteraction::handel(
            object: InteractionFacrory::make(
                attributes: array_merge(['user' => auth()->id()], $request->all())
                )
        );
        return new JsonResponse(
            data:[],
            status:Response::HTTP_CREATED
        );
    }
}
