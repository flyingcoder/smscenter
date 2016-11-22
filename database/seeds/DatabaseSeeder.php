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
            ['name' => 'BCG', 'dosage' => 'A', 'description' => 'at birth'],
            ['name' => 'OPV 1st dose', 'dosage' => 'B', 'description' => '6 weeks from birth'],
            ['name' => 'OPV 2nd dose', 'dosage' => 'C', 'description' => '10 weeks from birth'],
            ['name' => 'OPV 3rd dose', 'dosage' => 'D', 'description' => '14 weeks from birth'],
            ['name' => 'PENTAVALENT 1st dose', 'dosage' => 'B', 'description' => '6 weeks from birth'],
            ['name' => 'PENTAVALENT 2nd dose', 'dosage' => 'C', 'description' => '10 weeks from birth'],
            ['name' => 'PENTAVALENT 3rd dose', 'dosage' => 'D', 'description' => '14 weeks from birth'],
            ['name' => 'Hepatitis B', 'dosage' => 'A', 'description' => 'at birth'],
            ['name' => 'Measles', 'dosage' => 'E', 'description' => '9 months from birth'],
            ['name' => 'PCV 13 1st dose', 'dosage' => 'B', 'description' => '6 weeks from birth'],
            ['name' => 'PCV 13 2nd dose', 'dosage' => 'C', 'description' => '10 weeks from birth'],
            ['name' => 'PCV 13 3rd dose', 'dosage' => 'D', 'description' => '14 weeks from birth'],
            ['name' => 'MMR 1st dose', 'dosage' => 'F', 'description' => '12 months from birth'],
            ['name' => 'MMR 2nd dose', 'dosage' => 'J', 'description' => '4 years from birth'],
            ['name' => 'IPV', 'dosage' => 'D', 'description' => '14 weeks from birth']
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
