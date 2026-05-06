<?php

namespace App\Http\Controllers;

use App\Http\Resources\BaptismResource;
use App\Models\Baptism;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BaptismsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $baptisms = Baptism::all();

        return Inertia::render("Baptisms", [
            "baptisms" => BaptismResource::collection($baptisms),
        ]);
    }
}
