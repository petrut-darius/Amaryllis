<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriberController extends Controller
{
    public function create() {
        return Inertia::render("Newsletter");
    }

    public function store(StoreSubscriberRequest $request) {
        $data = $request->validated();

        //dd($data);

        Subscriber::create([
            "name" => $data["name"],
            "email" => $data["email"],
        ]);

        return redirect()->back();
    }
}
