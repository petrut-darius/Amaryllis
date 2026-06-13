<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArrangementResource;
use App\Models\Arrangement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class ArrangementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $arrangements = collect(Cache::remember('arrangements', 600, function () {
            return Arrangement::all()->toArray();
        }));

        return Inertia::render('Arrangements', [
            'arrangements' => ArrangementResource::collection($arrangements),
        ]);
    }
}
