<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class ThreadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $threads = collect(Cache::remember('threads', 600, function () {
            return Thread::all()->toArray();
        }));

        return Inertia::render('Threads', [
            'threads' => ThreadResource::collection($threads),
        ]);
    }
}
