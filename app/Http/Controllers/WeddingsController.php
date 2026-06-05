<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeddingResource;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class WeddingsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $weddings = collect(Cache::remember("weddings", 600, function() {
            return Wedding::all()->toArray();
        }));

        return Inertia::render("Weddings", [
            "weddings" => WeddingResource::collection($weddings),
        ]);
    }
}
