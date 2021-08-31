<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Thanks for contacting us.',
        ], 200);
    }


    public function show(ContactUs $contactUs)
    {
        //
    }


    public function edit(ContactUs $contactUs)
    {
        //
    }


    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }


    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
