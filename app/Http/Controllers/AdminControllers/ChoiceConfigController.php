<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChoiceConfig;
use Illuminate\Support\Facades\Storage;

class ChoiceConfigController extends Controller
{
    public function edit()
    {
        return view('admin.settings.choice.edit',[
            'choice'=>ChoiceConfig::find(1)
        ]);
    }

    public function update()
    {
        $validated= request()->validate([
            'title' =>'required',
            'team_title' => 'required',
            'quality' =>'required',
            'recompense' =>  'required',
            'personnel' => 'required',
            'assistance' => 'required',
            'image' =>'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=800',
        ]);

        if (request()->has('image')){
            $about_image=request()->file('image');
            $folder='configImgs';
            if(!Storage::disk('public')->exists($folder)){
                Storage::disk('public')->makeDirectory($folder);
            }
            $deletePath = ChoiceConfig::find(1)->image;
            if ($deletePath !== null && Storage::disk('public')->exists($deletePath)) {
                Storage::disk('public')->delete($deletePath);
            }
            $path=$about_image->store($folder,'public');
            $validated['image']=$path;
        }
        ChoiceConfig::find(1)->update($validated);
        return redirect()->route('admin.choice.edit')->with('success','les données de pourquoi nous choisir ont bien été mis à jour');
    }
}
