<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Support\Str;
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
            "token" => Str::uuid(),
            "subscribed_at" => now(),
        ]);

        return redirect()->back();
    }

    public function destroy(String $token) {
        $subscriber = Subscriber::where("token", $token)->firstOrFail();
        $subscriber->update([
            "unsubscribed_at" => now(),
        ]);

        return redirect()->route("home");
    }
}
