<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use App\Models\AskService;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $nbUser=User::all()->count();
        $nbComments=Comment::all()->count();
        $nbPost=Post::all()->count();
        $nbContact=Contact::all()->count();
        $nbServiceContact=AskService::all()->count();
        $nbService=Service::all()->count();
        return view('admin.index',[
            'nbUser'=>$nbUser,
            'nbComment'=>$nbComments,
            'nbPost'=>$nbPost,
            'nbContact'=>$nbContact,
            'nbContactService'=>$nbServiceContact,
            'nbService'=>$nbService,
        ]);
    }
}
