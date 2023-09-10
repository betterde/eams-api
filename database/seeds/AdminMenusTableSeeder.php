<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'parent_id' => 0,
                'order' => 2,
                'title' => 'School',
                'icon' => 'fa-bank',
                'uri' => '/school',
                'permission' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'order' => 3,
                'title' => 'Teacher',
                'icon' => 'fa-user-md',
                'uri' => '/teacher',
                'permission' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'order' => 4,
                'title' => 'Invitation',
                'icon' => 'fa-ticket',
                'uri' => '/invitation',
                'permission' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'order' => 5,
                'title' => 'Student',
                'icon' => 'fa-group',
                'uri' => '/student',
                'permission' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('admin_menu')->insert($menus);
    }
}
