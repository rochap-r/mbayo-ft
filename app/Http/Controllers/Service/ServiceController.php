<?php

namespace App\Http\Controllers\Service;

use App\Models\Config;
use App\Models\Service;
use App\Mail\AskService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services=Service::where('approved',1)->latest()->get();
        $servicesContact=Service::pluck('id','title');
        //dd($servicesContact);
        return view('services.index',[
            'services'=>$services,
            'servicesContact'=>$servicesContact
        ]);
    }

    public function show(Service $service)
    {
        return view('services.show',[
            'service'=>$service,
        ]);
    }

    public function store()
    {
        $data=array();
        $data['errors']=[];
        $data['success']=0;
        $rules=[
            'name'=>'required' ,
            'email'=>'required' ,
            'service_id'=>'required' ,
            'body'=>'required|min:3|max:500'
        ];

        $validated=Validator::make(\request()->all(),$rules);
        if ($validated->fails()){
            $data['errors']['name']=$validated->errors()->first('name');
            $data['errors']['email']=$validated->errors()->first('email');
            $data['errors']['body']=$validated->errors()->first('body');

        }else {
            $attributes=$validated->validated();

            $info=\App\Models\AskService::create($attributes);

            $email = Config::find(1)->service_email;
            if (Mail::to($email)->send(new AskService(
                $attributes['name'],
                $attributes['email'],
                $info->service->title,
                $attributes['body']
            ))) {
                //
            }else{
                return response()->Fail('Désolé! Veuillez rééssayer plus tard');
            }
            $data['success']=1;
            $data['message']='Merci, nous avons reçu votre message avec succès, nous vous répondrons le plus vite possible.';
        }

        // return redirect()->route('contact.create')->with('success','Merci,nous avons reçu votre message avec succès, nous vous répondrons au plus vite.');
        return response()->json($data);
    }
}
