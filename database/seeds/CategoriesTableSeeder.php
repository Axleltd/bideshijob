<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                [
                    'name'     => 'Immigration',
                    'slug' => 'immigration',
                    'order'    => 1,
                    'featured' => 1,
                    
                ],
                [
                    'name'     => 'Insurance',
                    'slug' => 'insurance',
                    'order'    => 2,
                    'featured' => 1,
                    
                ],
                [
                    'name'     => 'Medical',
                    'slug' => 'medical',
                    'order'    => 3,
                    'featured' => 1,
                    
                ],
                [
                    'name'     => 'Blog',
                    'slug' => 'blog',
                    'order'    => 3,
                    'featured' => 1,
                    
                ]
        ];
            DB::table('categories')
                ->insert($data);
             
           
    }
}
