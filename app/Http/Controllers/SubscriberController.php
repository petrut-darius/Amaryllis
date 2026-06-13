<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SubscriberController extends Controller
{
    public function create()
    {
        return Inertia::render('Newsletter');
    }

    public function store(StoreSubscriberRequest $request)
    {
        $data = $request->validated();

        // dd($data);

        if (Auth::check()) {
            $termsAcceptedAt = Auth::user()->terms_accepted_at;
        } else {
            $termsAcceptedAt = $data['terms_accepted_at'];
        }

        Subscriber::firstOrCreate(
            [
                'email' => $data['email'],
            ],
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'token' => Str::uuid(),
                'subscribed_at' => now(),
                'terms_accepted_at' => $termsAcceptedAt ? now() : null,
            ]
        );

        return redirect()->route('home');
    }

    public function destroy(string $token)
    {
        $subscriber = Subscriber::where('token', $token)->firstOrFail();
        $subscriber->update([
            'unsubscribed_at' => now(),
        ]);

        return redirect()->route('home');
    }
}
