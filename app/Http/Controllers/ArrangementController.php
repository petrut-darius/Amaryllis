<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArrangementResource;
use App\Models\Arrangement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArrangementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $arrangements = Arrangement::all();

        return Inertia::render("Arrangements", [
            "arrangements" => ArrangementResource::collection($arrangements),
        ]);
    }
}
