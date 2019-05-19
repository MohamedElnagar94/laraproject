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
        for ($i=0; $i < 15; $i++) { 
            $add = new student;
            $add->username = Arr::random(['mohamed','ahmed','abdo','aya','sabry','asmaa','hanan','khaled']);
            $add->user_id = 1;
            $add->password = bcrypt(rand(100,1000));
            $add->email = Arr::random(['mohamed@info.com','speedo2003r@gmail.com','ahmed@info.com','abdo@info.com','mohamedelnagar461@yahoo.com','mohamedelnagar132@yahoo.com','aya@info.com']);
            $add->phone = rand(11090789,99999999);
            $add->age = rand(20,40);
            $add->gender = rand(1,2);
            $add->save();
        }
    }
}
