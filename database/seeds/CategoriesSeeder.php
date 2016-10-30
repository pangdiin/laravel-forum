<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
        	['id'=>1, 'name'=> 'PHP', 'created_at'=>new Datetime, 'updated_at'=>new Datetime],
        	['id'=>2, 'name'=> 'HTML', 'created_at'=>new Datetime, 'updated_at'=>new Datetime],
        	['id'=>3, 'name'=> 'CSS', 'created_at'=>new Datetime, 'updated_at'=>new Datetime],
        	['id'=>4, 'name'=> 'JAVASCRIPT', 'created_at'=>new Datetime, 'updated_at'=>new Datetime],
        	['id'=>5, 'name'=> 'C#', 'created_at'=>new Datetime, 'updated_at'=>new Datetime]
        ];

        DB::table('categories')->insert($categories);
    }
}
