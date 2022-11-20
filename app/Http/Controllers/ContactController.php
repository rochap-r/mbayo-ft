<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Contact as ModelsContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function store()
    {
        $data=array();
        $data['errors']=[];
        $data['success']=0;
        $rules=[
            'name'=>'required' ,
            'email'=>'required' ,
            'subject'=>'required' ,
            'body'=>'required|min:3|max:500'
        ];

        $validated=Validator::make(\request()->all(),$rules);
        if ($validated->fails()){
            $data['errors']['name']=$validated->errors()->first('name');
            $data['errors']['email']=$validated->errors()->first('email');
            $data['errors']['subject']=$validated->errors()->first('subject');
            $data['errors']['body']=$validated->errors()->first('body');

        }else {
            $attributes=$validated->validated();

            ModelsContact::create($attributes);

            if (Mail::to(env('ADMIN_CONTACT_EMAIL'))->send(new Contact(
                $attributes['name'],
                $attributes['email'],
                $attributes['subject'],
                $attributes['body']
            ))) {
                //
            }else{
                return response()->Fail('Désolé! Veuillez rééssayer plus tard');
            }
            $data['success']=1;
            $data['message']='Mail bien réçu, nous vous répondons le plus vite possible.';
        }
        return response()->json($data);
    }
}
