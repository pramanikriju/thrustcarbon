<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEnvironementRequest;
use App\Http\Requests\CreatePlantRequest;
use App\Models\Environment;
use App\Models\Plant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function setEnvironment(Plant $plant, CreateEnvironementRequest $request)
    {
        $validated = $request->validated();
        //dd($validated);

        DB::transaction(function () use ($validated, $plant){
            foreach ($validated as $item)
            {
                Environment::create([
                    'plant_id' => $plant->id,
                    'data' => json_encode($item)
                ]);
            }
        }, 5);
        return response()->json([
            'status' => 'Added to environment'
        ]);
    }
}
