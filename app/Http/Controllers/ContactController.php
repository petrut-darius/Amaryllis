<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUser;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function create() {
        return Inertia::render("Contact");   
    }

    public function store(StoreContactUser $request) {
        //email to user that have manage:users

        //save contact in the db
        
        //toast notifs

        return redirect()->back();
    }
}
