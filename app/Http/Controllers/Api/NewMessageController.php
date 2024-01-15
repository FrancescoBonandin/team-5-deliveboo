<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewMail;
use App\Models\NewMessage;
use Illuminate\Support\Facades\Mail;


// class NewMessageController extends Controller
// {
//     public function store(Request $request) {
//         $request->validate([
//             'name'=>'required',
//             'email'=>'required',
//             'message'=>'required'
//         ]);

//         $formData = $request->all();
//         $newMessage = NewMessage::create($formData);
//         Mail::to('boolean@careers.com')->send(new NewMail($newMessage));
//         return response()->json($formData);
//     }
// }
