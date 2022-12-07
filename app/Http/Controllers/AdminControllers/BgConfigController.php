<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\BgConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BgConfigController extends Controller
{
    public function edit()
    {
        return view('admin.settings.bgConfig.edit', [
            'bg' => BgConfig::find(1)
        ]);
    }

    private function checkFile($field,$about_image,$folder="bg_imgs"){
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }
        $deletePath = $field;
        if ($deletePath !== null && Storage::disk('public')->exists($deletePath)) {
            Storage::disk('public')->delete($deletePath);
        }
        $path = $about_image->store($folder, 'public');
        return $path;
    }

    public function update()
    {
        $validated = request()->validate([

            'mft_bg_image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=1920,max_height=1080',
            'service_bg_image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=1920,max_height=1080',
            'contact_bg_image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=1920,max_height=1080',
            'about_bg_image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=1920,max_height=1080',
        ]);

        $bg = BgConfig::find(1);
        //remplacement des images 
        if (request()->has('mft_bg_image')) {
            $about_image = request()->file('mft_bg_image');
            $path=$this->checkFile($bg->mft_bg_image,$about_image);
            $validated['mft_bg_image'] = $path;
        }

        if (request()->has('service_bg_image')) {
            $about_image = request()->file('service_bg_image');
            $path=$this->checkFile($bg->mft_bg_image,$about_image);
            $validated['service_bg_image'] = $path;
        }

        if (request()->has('contact_bg_image')) {
            $about_image = request()->file('contact_bg_image');
            $path=$this->checkFile($bg->mft_bg_image,$about_image);
            $validated['contact_bg_image'] = $path;
        }

        if (request()->has('about_bg_image')) {
            $about_image = request()->file('about_bg_image');
            $path=$this->checkFile($bg->mft_bg_image,$about_image);
            $validated['about_bg_image'] = $path;
        }

        BgConfig::find(1)->update($validated);
        return redirect()->route('admin.bgConfig.edit')->with('success', 'les fonds d\'écrans ont été mis à jour');
    }
}
