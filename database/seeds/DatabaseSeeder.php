<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Vaccine;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	Model::unguard();

        DB::table('users')->delete();

        DB::table('vaccines')->delete();

        $users = array(
            ['name' => 'Alvin Pacot', 'email' => 'admin@gmail.com', 'password' => Hash::make('secret'), 'users_type' => 'admin', 'phone' => '+639754882784'],
            ['name' => 'Name Lastname', 'email' => 'user1@gmail.com', 'password' => Hash::make('secret'), 'users_type' => 'member']
    	);

        $vaccine = array(
            ['name' => 'BCG', 'dosage' => 'A'],
            ['name' => 'OPV 1st dose', 'dosage' => 'B'],
            ['name' => 'OPV 2nd dose', 'dosage' => 'B'],
            ['name' => 'OPV 3rd dose', 'dosage' => 'B'],
            ['name' => 'PENTAVALENT 1st dose', 'dosage' => 'B'],
            ['name' => 'PENTAVALENT 2nd dose', 'dosage' => 'B'],
            ['name' => 'PENTAVALENT 3rd dose', 'dosage' => 'B'],
            ['name' => 'Hepatitis B', 'dosage' => 'A'],
            ['name' => 'Measles', 'dosage' => 'C'],
            ['name' => 'PCV 13 1st dose', 'dosage' => 'B'],
            ['name' => 'PCV 13 2nd dose', 'dosage' => 'B'],
            ['name' => 'MMR 1st dose', 'dosage' => 'D'],
            ['name' => 'MMR 2nd dose', 'dosage' => 'D'],
            ['name' => 'IPV', 'dosage' => 'E']
        );

        foreach ($vaccine as $value) {
            Vaccine::create($value);
        }
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
