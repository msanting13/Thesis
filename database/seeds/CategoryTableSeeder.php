<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Quantitative Reasoning','Quantitative Reasoning','Verbal Reasoning','Verbal Comprehension'];
        foreach ($categories as $key => $category) 
        {
        	$categoryModel = new Category();
        	$categoryModel->name = $category;
        	$categoryModel->description = 'Short Desc';
        	$categoryModel->save();
        }
    }
}
