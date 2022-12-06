<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\AskService;
use Illuminate\Http\Request;

class ServiceContactsController extends Controller
{
    public function index()
    {
        return view('admin.serviceContacts.index',[
            'askServices'=>AskService::paginate(25),
        ]);
    }

    public function destroy(AskService $askService)
    {
        $askService->delete();
        return redirect()->route('admin.serviceContact.index')->with('success', 'Le Contact du client a bien été supprimé!');
    }
}
