<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where([
            "email" => "admin@gmail.com"
        ])->first();
        if($admin == null){
            User::create([
                "name" => "admin",
                "email" => "admin@gmail.com",
                "email_verified_at" => now(),
                "password" => Hash::make("password"),
                "remember_token" => Str::random(10)
            ]);
            $this->command->info("Created the admin user");
            $admin = User::where([
                "email" => "admin@gmail.com"
            ])->first();
        }else{
            $this->command->info("Admin user already exists");
        }
        $this->command->info("Importing data from endpoint.");
        $data = PostFactory::getFromEndpoint();
        for($i=0; $i<count($data); $i++){
            $this->command->info("Importing \"".$data[$i]->title."\" ".($data[$i]->publication_date)."");
            Post::create([
                "title" => $data[$i]->title,
                "content" => $data[$i]->description,
                "publication_date" => $data[$i]->publication_date,
                "poster_id" => $admin->id
            ]);
        }
        $this->command->info("Finished setting-up admin and imported posts.");
    }
}
