<?php

use Illuminate\Database\Seeder;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = new \App\Models\User();
        $User->name = 'Admin';
        $User->email = 'admin@admin.com';
        $User->password = Hash::make('123456');
        $User->save();

    }
}
