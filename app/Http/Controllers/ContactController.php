<?php

namespace App\Http\Controllers;

use App\Enums\UserPermissions;
use App\Http\Requests\StoreContactUser;
use App\Mail\AdminUserContacted;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function create() {
        return Inertia::render("Contact");   
    }

    public function store(StoreContactUser $request) {
        $data = $request->validated();

        //dd($data);

        //save contact in the db
        $contact = Contact::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "subject" => $data["subject"],
            "message" => $data["message"],
            "event_date" => $data["event_date"],
            "vision" => $data["vision"]
        ]);
    
        //email to user that have manage:users
        $adminUsers = User::whereHas("permissions", function($q) {
            $q->where("slug", UserPermissions::MANAGE_USERS->value);
        })->get();

        foreach($adminUsers as $user) {
            Mail::to($user)->send(new AdminUserContacted($contact, $data));
        }
    
        return redirect()->back();
    }
}
