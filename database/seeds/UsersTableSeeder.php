<?php

use App\Admin;
use App\Category;
use App\User;
use App\Writer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = \Faker\Factory::create();
        $password = Hash::make('123123');

        $admin = Admin::create(['credential_number' => '0987654321']);
        $admin->user()->create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' => $password,
            'role'=>'ROLE_ADMIN'
        ]);
        for ($i = 0; $i < 10; $i++) {
            $writer = Writer::create([
                'editorial' => $faker->company,
                'short_bio' => $faker->paragraph,
            ]);

            $writer->user()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
            $writer->user->categories()->saveMany(
                $faker->randomElements(
                    array(
                        Category::find(1),
                        Category::find(2),
                        Category::find(3)
                    ), $faker->numberBetween(1, 3), false
                )
            );


        }
    }
}
