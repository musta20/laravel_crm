<?php

namespace App\Http\Controllers\Api\Interactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return new JsonResponse(
            data: auth()->user()->interactions,
            status:Response::HTTP_OK
        );
    }
}
