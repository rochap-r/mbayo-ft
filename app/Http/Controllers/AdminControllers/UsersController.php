<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    private $rules=[
        'name'=>'required|min:3',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:8|max:20',
        'role_id'=>'required|numeric',
        'image'=>'nullable|file|mimes:jpg,png,webp;svg,jpeg|dimensions:max_width=500,max_height=500',
    ];

    public function index()
    {
        return view('admin.users.index',[
            'users'=>User::with('role')->paginate(25)
    ]);
    }


    public function create()
    {
        return view('admin.users.create',[
            'roles'=>Role::pluck('name','id') ,//pas de pluck comme role c'est id et name
        ]);
    }


    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        //$validated['password']=password_hash($request->password,PASSWORD_BCRYPT);

        $validated['password']=Hash::make($request->input('password'));
        $user=User::create($validated);
        if ($request->has('image')){
            $image=$request->file('image');

            $folder = 'teamImgs';
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $path=$image->store($folder,'public');
            $fileName=$image->getClientOriginalName();
            $extension=$image->getClientOriginalExtension();
            //création de l'image de l'article
            $user->image()->create([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }
        return redirect()->route('admin.users.create')->with('success',"L'utilisateur a bien été créé!");

    }

    public function show(User $user)
    {
        return view('admin.users.show',[
            'user'=>$user
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'user'=>$user,
            'roles'=>Role::pluck('name','id'),
        ]);
    }


    public function update(Request $request, User $user)
    {
        $this->rules['password']='nullable|min:3|max:30';
        $this->rules['email']=['required','email',Rule::unique("users")->ignore($user)];
        $validated=$request->validate($this->rules);
        if($validated['password']===null)
            unset($validated['password']);
        else
          $validated['password']=Hash::make($request->input('password'));

        $user->update($validated);
        if ($request->has('image')){
            $image=$request->file('image');
            $folder = 'teamImgs';
            $field = $user->image->path;
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $deletePath = $field;
            if ($deletePath !== null && Storage::disk('public')->exists($deletePath)) {
                Storage::disk('public')->delete($deletePath);
            }
            $path=$image->store($folder,'public');
            $fileName=$image->getClientOriginalName();
            $extension=$image->getClientOriginalExtension();
            //création de l'image de l'article
            $user->image()->update([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }
        return redirect()->route('admin.users.edit',$user)->with('success',"L'utilisateur a bien été mis à jour!");

    }




    public function destroy(User $user)
    {
        if ($user->id===auth()->id())
            return redirect()->back()->with('error',"Vous ne pouvez pas supprimé l'Administrateur système!");

        /**
         * attachment des articles d'un user qui n'est pas admin qu'on veut supprimé
         * à l'administrateur
         */
        User::whereHas('role',function($query){
                $query->where('name','admin');
        })->first()->posts()->saveMany($user->posts);


        $user->delete();
        return redirect()->route('admin.users.index')->with('success',"L'utilisateur a bien été supprimé!");
    }
}
