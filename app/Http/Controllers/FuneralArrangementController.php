<?php

namespace App\Http\Controllers;

use App\Http\Resources\FuneralArrangementResource;
use App\Models\FuneralArrangement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class FuneralArrangementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $funeralArrangements = collect(Cache::remember('funeralArrangements', 600, function () {
            return FuneralArrangement::all()->toArray();
        }));

        return Inertia::render('FuneralArrangements', [
            'funeralArrangements' => FuneralArrangementResource::collection($funeralArrangements),
        ]);
    }
}
