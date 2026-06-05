<?php

namespace App\Http\Controllers;

use App\Http\Resources\BaptismResource;
use App\Models\Baptism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class BaptismsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $baptisms = collect(Cache::remember("baptisms", 600, function() {
            return Baptism::all()->toArray();
        }));

        return Inertia::render("Baptisms", [
            "baptisms" => BaptismResource::collection($baptisms),
        ]);
    }
}
