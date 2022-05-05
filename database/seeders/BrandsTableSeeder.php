<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert(['name'=>'ADIDAS','description'=>'description adidas','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('brands')->insert(['name'=>'NIKE','description'=>'description nike','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('brands')->insert(['name'=>'LACOSTE','description'=>'description lacoste','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
