<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ThreadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $threads = Thread::all();

        return Inertia::render("Threads", [
            "threads" => ThreadResource::collection($threads),
        ]);
    }
}
