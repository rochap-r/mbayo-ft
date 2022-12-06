<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index',[
            'contacts'=>Contact::paginate(25),
        ]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Le Contact a bien été supprimé!');
    }
}
