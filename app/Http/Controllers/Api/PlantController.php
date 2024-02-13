<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePlantRequest;
use App\Models\Plant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * @param CreatePlantRequest $request
     * @return JsonResponse
     */
    public function create(CreatePlantRequest $request)
    {
        $validated = $request->validated();
        $plant = Plant::create($validated);

        return response()->json([
           'id' => $plant->id
        ]);
    }
}
