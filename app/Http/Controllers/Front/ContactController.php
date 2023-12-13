<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('front.contact', ['subjects' => Contact::$subject]);
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());
        toastr()->addSuccess('Message Sent Successfully');
        return back();
    }
}
