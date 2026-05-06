<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeddingResource;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeddingsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $weddings = Wedding::all();

        return Inertia::render("Weddings", [
            "weddings" => WeddingResource::collection($weddings),
        ]);
    }
}
