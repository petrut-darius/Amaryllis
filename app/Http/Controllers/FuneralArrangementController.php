<?php

namespace App\Http\Controllers;

use App\Http\Resources\FuneralArrangementResource;
use App\Models\FuneralArrangement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FuneralArrangementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $funeralArrangements = FuneralArrangement::all();

        return Inertia::render("FuneralArrangements", [
            "funeralArrangements" => FuneralArrangementResource::collection($funeralArrangements),
        ]);
    }
}
