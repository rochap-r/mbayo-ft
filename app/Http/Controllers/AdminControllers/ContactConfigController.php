<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\ContactConfig;
use Illuminate\Http\Request;

class ContactConfigController extends Controller
{
    public function edit()
    {
        return view('admin.settings.contact.edit',[
            'contact'=>ContactConfig::find(1)
        ]);
    }

    public function update()
    {
        $validated= request()->validate([
            'title' =>'required',
            'tel' =>'required',
            'email' => 'required',
            'adress' =>'required',
            'footerDescription' =>  'required',
        ]);

        ContactConfig::find(1)->update($validated);

        return redirect()->route('admin.contact.edit')->with('success','la page Contact a bien été mis à jour');
    }
}
