<?php

namespace App\Http\Controllers;

use App\Http\Resources\EighteenthResource;
use App\Models\Eighteenth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EighteenthsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $eighteenths = Eighteenth::all();

        return Inertia::render("Eighteenths", [
            "eighteenths" => EighteenthResource::collection($eighteenths),
        ]);
    }
}
