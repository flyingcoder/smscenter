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
            ['name' => 'Dumdum', 'email' => 'admin@gmail.com', 'password' => Hash::make('secret'), 'users_type' => 'admin']
    	);

        $vaccine = array(
            ['name' => 'BCG', 'dosage' => 'A'],
            ['name' => 'OPV 1st dose', 'dosage' => 'B'],
            ['name' => 'OPV 2nd dose', 'dosage' => 'C'],
            ['name' => 'OPV 3rd dose', 'dosage' => 'D'],
            ['name' => 'PENTAVALENT 1st dose', 'dosage' => 'B'],
            ['name' => 'PENTAVALENT 2nd dose', 'dosage' => 'C'],
            ['name' => 'PENTAVALENT 3rd dose', 'dosage' => 'D'],
            ['name' => 'Hepatitis B', 'dosage' => 'A'],
            ['name' => 'Measles', 'dosage' => 'E'],
            ['name' => 'PCV 13 1st dose', 'dosage' => 'B'],
            ['name' => 'PCV 13 2nd dose', 'dosage' => 'C'],
            ['name' => 'PCV 13 3rd dose', 'dosage' => 'D'],
            ['name' => 'MMR 1st dose', 'dosage' => 'F'],
            ['name' => 'MMR 2nd dose', 'dosage' => 'J'],
            ['name' => 'IPV', 'dosage' => 'D']
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
