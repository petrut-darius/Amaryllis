<?php

namespace App\Http\Controllers;

use App\Enums\UserPermissions;
use App\Http\Requests\StoreContactUser;
use App\Mail\AdminUserContacted;
use App\Mail\UserContacted;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function create()
    {
        return Inertia::render('Contact');
    }

    public function store(StoreContactUser $request)
    {
        $data = $request->validated();

        // dd($data);

        // save contact in the db
        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'event_date' => $data['event_date'],
            'vision' => $data['vision'],
        ]);

        // email to user that have manage:users
        $adminUsers = User::whereHas('permissions', function ($q) {
            $q->where('slug', UserPermissions::MANAGE_USERS->value);
        })->get();

        foreach ($adminUsers as $user) {
            Mail::to($user)->queue(new AdminUserContacted($contact, $data));
        }

        $user = Auth::user();

        Mail::to($user)->queue(new UserContacted);

        return redirect()->back();
    }
}
