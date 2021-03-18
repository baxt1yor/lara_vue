<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Validator;
class HomeController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function save(Request $request, Contact $contact){
        $req = [
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|max:2000' 
        ];
        $validator = Validator::make($request->all(), $req);
        
        if($validator->fails()){
            return response()->json(['error_message' => "Validation Failed"], 422);
        }

        $contact->create([
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'message' => $request->post('message')
        ]);

        return response()->json(['error_message' => "Your message has been delivered"], 200);

    }
}
