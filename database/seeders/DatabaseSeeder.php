<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Category;
use App\Models\Permission;
use App\Models\UserComment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * truncate empeche le double enregistrement d'une meme donnée
         */
        //Schema::disableForeignKeyConstraints();   desactive la contrainte de la clé etrangere

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Role::truncate();
        UserComment::truncate();

        Category::truncate();
        Post::truncate();
        Comment::truncate();
        Image::truncate();
        Service::truncate();
        Schema::enableForeignKeyConstraints();


        /**generation des fausses données */
        Role::factory(1)->create();
        Role::factory(1)->create(['name'=>"admin"]);

        //affiche toutes les url lors du lancement des migrations
        //dd(Route::getRoutes());

        $routes=Route::getRoutes();
        $permissions_id=[];

        // insertion de toutes les url d'admin dans la table permission
        foreach ($routes as $route){
            if (strpos($route->getName(),'admin')!==false)
            {
                $permission=Permission::create(['name'=>$route->getName()]);
                $permissions_id[]=$permission->id;
                //var_dump($route->getName());
            }

        }

        Role::where('name','admin')->first()->permissions()->sync($permissions_id);

        $users=User::factory(10);

        User::factory()->create([
            'name'=>'rodrigue',
            'email'=>'rodriguechot@gmail.com',
            'role_id'=>2
        ]);

        foreach($users as $user){
            $user->image()->save(Image::factory()->make());
        }

        Category::factory(10)->create();
        Category::factory(1)->create(['name'=>'sans-categorie']);

        $userComments=UserComment::factory(10)->create();
        foreach($userComments as $user){
            $user->image()->save(Image::factory()->make());
        }

        $posts=Post::factory(60)->create();

        Comment::factory(180)->create();
        $services=Service::factory(3)->create();

        foreach($posts as $post) {
            $post->image()->save(Image::factory()->make());
        }

        foreach($services as $service){
            $service->image()->save(Image::factory()->make());
        }


    }
}
