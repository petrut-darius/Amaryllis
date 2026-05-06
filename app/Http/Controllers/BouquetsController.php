<?php

namespace App\Http\Controllers;

use App\Http\Resources\BouquetResource;
use App\Models\Bouquet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BouquetsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //get all bouquets
        $bouquets = BouquetResource::collection(Bouquet::all());

        //dd($bouquets);

        //return them
        return Inertia::render("Bouquets", [
            "bouquets" => $bouquets,
        ]);
    }
}
