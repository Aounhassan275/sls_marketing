<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [ 'name' => 'Admin',
            'email' => 'admin@mail.com',
            'type' => '1',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
            ['name' => 'Admin 2',
            'email' => 'cashAli008@mail.com',
            'type' => '1',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);
        DB::table('users')->insert([
            [ 'name' => 'user1',
            'email' => 'user1@mail.com',
            'password' => Hash::make('1234'),
            'refferral_link' => uniqid(),
            'autopool_package_1' => 1,
            'autopool_package_2' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        ]);
        DB::table('sources')->insert([
            ['name' => 'PerfectMoney'],
        ]);
        DB::table('settings')->insert([
            ['name' => 'Site Name','value' => 'Expert Sale Zone'],
            ['name' => 'Phone','value' => '923XXXXXXXX'],
            ['name' => 'Email','value' => 'dummy@mail.com'],
            ['name' => 'Facebook','value' => 'facebook.com'],
            ['name' => 'Twitter','value' => 'twitter.com'],
            ['name' => 'Youtube','value' => 'twitter.com'],
            ['name' => 'Instagram','value' => 'Instagram.com'],
        ]);
        DB::table('company_accounts')->insert([
            ['name' => 'Matching Income'],
            ['name' => 'Expense Income'],
            ['name' => 'Flash Income'],
            ['name' => 'Reward Income'],
            ['name' => 'Loss Income'],
            ['name' => 'Salary'],
            ['name' => 'Product Income'],
        ]);
        DB::table('payments')->insert([
            [
                'name' => 'Name 1',
                'number' => '123123123123',
                'method' => 'PerfectMoney',
                'bnumber' => '132123123123',
            ],
            
        ]);
        DB::table('categories')->insert([
            ['name' => 'Category 1','image' => '/uploaded_images/categories/591677327994.jpg'],
            ['name' => 'Category 2','image' => '/uploaded_images/categories/341677328002.jpg'],
            ['name' => 'Category 3','image' => '/uploaded_images/categories/901677328010.jpg'],
        ]);
        DB::table('brands')->insert([
            ['name' => 'Brand 1','category_id' => 1,'image' => '/uploaded_images/brands/451677328033.png'],
            ['name' => 'Brand 2','category_id' => 2,'image' => '/uploaded_images/brands/291677328041.png'],
            ['name' => 'Brand 3','category_id' => 3,'image' => '/uploaded_images/brands/751677328052.png'],
        ]);
        DB::table('sliders')->insert([
            ['title' => 'Slider Type 1','image' => '/uploaded_images/sliders/201677327691.jpg','color' => '#3aafd2'],
            ['title' => 'Slider Type 2','image' => '/uploaded_images/sliders/791677327704.jpg','color' => '#3aafd2'],
            ['title' => 'Slider Type 3','image' => '/uploaded_images/sliders/421677327715.jpg','color' => '#3aafd2'],
        ]);
        DB::table('packages')->insert([
            [ 'price' => '1000',
            'name' => 'Package 1',
            'direct_income' => '40',
            'indirect_income' => '40',
            'withdraw_limit' => '1000',
            'income_limit' => '1000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
        ]);
    }
}
