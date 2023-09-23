<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use PharIo\Manifest\Email;
use Illuminate\Database\Seeder;
use Database\Factories\listingFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            //\App\Models\User::factory(10)->create();
            $user= \App\Models\User::factory()->create(
                [
                    'name'=>'John',
                    'email'=>'john@example.com',

                ]
            );
            Listing::factory(6)->create([
                'user_id'=>$user->id,
            ]);

            // Listing::create(
            //     [
            //         'title' => 'Software Engineer',
            //         'tags'=>'laravel,php',
            //         'company' => 'modern solutions',
            //         'location' => 'newyork/usa',
            //         'email'=>'jack@ex.com',
            //         'website' => 'http://ex.com',
            //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
            //         Nemo beatae natus incidunt blanditiis,
            //         at exercitationem provident aliquid vitae molestiae,
            //         delectus quia deleniti dolore consectetur.
            //         Magnam quas perferendis voluptatibus! Dicta, facere!',
            //     ]
            // );
            // Listing::create(
            //     [
            //         'title' => 'Security Engineer',
            //         'tags'=>'Scanning,vulnerability',
            //         'company' => 'tech art',
            //         'location' => 'florida/usa',
            //         'email'=>'mk_a@ex.com',
            //         'website' => 'http://asx.com',
            //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
            //         Nemo beatae natus incidunt blanditiis,
            //         at exercitationem provident aliquid vitae molestiae,
            //         delectus quia deleniti dolore consectetur.
            //         Magnam quas perferendis voluptatibus! Dicta, facere!',
            //     ]
            // );
            
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
