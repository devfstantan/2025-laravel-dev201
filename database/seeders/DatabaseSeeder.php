<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        foreach($users as $u){
            $u->profile()->create([
                  'cin' => 'JF 12345',
            'birth_city' => 'Tantan'
            ]);
        }

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user->profile()->create([
            'cin' => 'JF 12345',
            'birth_city' => 'Tantan'
        ]);

        // appel Seeder des catégories ensuite celui des produits
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
