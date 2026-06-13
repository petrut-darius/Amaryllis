<?php

namespace App\Http\Controllers;

use App\Http\Resources\EighteenthResource;
use App\Models\Eighteenth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class EighteenthsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $eighteenths = collect(Cache::remember('eighteenths', 600, function () {
            return Eighteenth::all()->toArray();
        }));

        return Inertia::render('Eighteenths', [
            'eighteenths' => EighteenthResource::collection($eighteenths),
        ]);
    }
}
