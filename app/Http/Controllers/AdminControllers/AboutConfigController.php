<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\AboutConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutConfigController extends Controller
{
    public function edit()
    {
        return view('admin.settings.about.edit',[
            'about'=>AboutConfig::find(1)
        ]);
    }

    public function update()
    {
        $validated= request()->validate([
            'title' =>'required',
            'description' => 'required',
            'caracteristique1' =>'required',
            'caracteristique2' =>  'required',
            'caracteristique3' => 'required',
            'caracteristique4' => 'required',
            'image' =>'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=800',
        ]);

        if (request()->has('image')){
            $about_image=request()->file('image');
            $folder='configImgs';
            if(!Storage::disk('public')->exists($folder)){
                Storage::disk('public')->makeDirectory($folder);
            }
            $deletePath = AboutConfig::find(1)->image;
            if ($deletePath !== null && Storage::disk('public')->exists($deletePath)) {
                Storage::disk('public')->delete($deletePath);
            }
            $path=$about_image->store($folder,'public');
            $validated['image']=$path;
        }
        AboutConfig::find(1)->update($validated);
        return redirect()->route('admin.about.edit')->with('success','la page A-propos a bien été mis à jour');
    }
}
