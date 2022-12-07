<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Config;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('admin.settings.config.edit',[
            'config'=>Config::find(1)
        ]);
    }

    public function update()
    {
        
        $validated= request()->validate([
            'service_email' =>'required',
            'contact_email' =>'required',
            'clients' => 'required|numeric',
            'projets' =>'required|numeric',
            'recompenses' =>'required|numeric',
        ]);
        

        Config::find(1)->update($validated);

        return redirect()->route('admin.config.edit')->with('success','les donnéés  de configuration ont été mis à jour');
    }
}
