<?php

use Illuminate\Database\Seeder;
use App\Administrator;
class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $input = [
        [
          "email" => "email@email.com",
          "name"  => "Admin",
          "password" => bcrypt("password")
        ],
        [
          "email" => "email2@email2.com",
          "name"  => "Admin",
          "password" => bcrypt("password")
        ],
      ];

      Administrator::insert($input);
    }
}
