<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.me';
        $admin->position = 'Guidance Councelor';
        $admin->password = Hash::make('p4ssword');
        $admin->save();
    }
}
