<?php

use Illuminate\Database\Seeder;

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

    	// Model::unguard();
    	/*
		// sample organizer
		$jajang = App\Models\User::create([
			'name' => 'Jajang Sopandi',
			'name' => 'jajang',
			'email' => 'jajang@gmail.com',
			'password' => bcrypt('rahasia'),
			'role' => 'organizer',
			'membership' => 'gold'
		]);
			$ucok = App\Models\User::create([
			'name' => 'Ucok Prayogo',
			'name' => 'ucok',
			'email' => 'ucok@gmail.com',
			'password' => bcrypt('rahasia'),
			'role' => 'organizer',
			'membership' => 'platinum'
		]);
		// sample participant
		$beni = App\Models\User::create([
			'name' => 'Beni Wijaya',
			'name' => 'beni',
			'email' => 'beni@gmail.com',
			'password' => bcrypt('rahasia'),
			'role' => 'participant',
			'membership' => 'gold'
		]);
		// sample event
		$meetupJS = App\NewEvent::create([
			'organizer_id' => $jajang->id,
			'name' => 'Meetup JS Jakarta',
			'description' => 'Kumpul bareng developer JS',
			'location' => 'Balai Kartini',
			'begin_date' => '2016-03-10',
			'finish_date' => '2016-03-11',
			'published' => 1
		]);
		$meetupLaravel = App\NewEvent::create([
			'organizer_id' => $ucok->id,
			'name' => 'Meetup Laravel Bandung',
			'description' => 'Kumpul bareng developer Laravel',
			'location' => 'Sabuga',
			'begin_date' => '2016-04-02',
			'finish_date' => '2016-04-05',
			'published' => 0
		]);
		*/
		$artisanBdg = App\Organization::create([
			'name' => 'Artisan Bandung',
			'admin_id' => 13
		]);

		// Model::reguard();
	}
}
