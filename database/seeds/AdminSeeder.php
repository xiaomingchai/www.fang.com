<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //调用factory数据，生成数据
        factory(Admin::class,10)->create();


    }
}
