<?php

use Illuminate\Database\Seeder;
use App\student;
use Illuminate\Support\Arr;

class students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $add = new student;
            $add->studentname = Arr::random(['mohamed','ahmed','abdo']);
            $add->studentpassword = rand(100,1000);
            $add->studentemail = Arr::random(['mohamed@info.com','ahmed@info.com','abdo@info.com']);
            $add->studentphone = rand(11090789,99999999);
            $add->studentage = rand(20,40);
            $add->gender = rand(1,2);
            $add->save();
        }
    }
}
