<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['title' => 'user_management_access',],
            ['title' => 'user_management_create',],
            ['title' => 'user_management_edit',],
            ['title' => 'user_management_view',],
            ['title' => 'user_management_delete',],
            ['title' => 'permission_access',],
            ['title' => 'permission_create',],
            ['title' => 'permission_edit',],
            ['title' => 'permission_view',],
            [ 'title' => 'permission_delete',],
            [ 'title' => 'role_access',],
            [ 'title' => 'role_create',],
            [ 'title' => 'role_edit',],
            [ 'title' => 'role_view',],
            [ 'title' => 'role_delete',],
            [ 'title' => 'user_access',],
            [ 'title' => 'user_create',],
            [ 'title' => 'user_edit',],
            [ 'title' => 'user_view',],
            [ 'title' => 'user_delete',],
            [ 'title' => 'country_access',],
            [ 'title' => 'country_create',],
            [ 'title' => 'country_edit',],
            [ 'title' => 'country_view',],
            [ 'title' => 'country_delete',],
            [ 'title' => 'category_access',],
            [ 'title' => 'category_create',],
            [ 'title' => 'category_edit',],
            [ 'title' => 'category_view',],
            [ 'title' => 'category_delete',],
            [ 'title' => 'room_access',],
            [ 'title' => 'room_create',],
            [ 'title' => 'room_edit',],
            [ 'title' => 'room_view',],
            [ 'title' => 'room_delete',],
            [ 'title' => 'customer_access',],
            [ 'title' => 'customer_create',],
            [ 'title' => 'customer_edit',],
            [ 'title' => 'customer_view',],
            [ 'title' => 'customer_delete',],
            [ 'title' => 'booking_access',],
            [ 'title' => 'booking_create',],
            [ 'title' => 'booking_edit',],
            [ 'title' => 'booking_view',],
            [ 'title' => 'booking_delete',],
        ];

            Permission::insert($permissions);

    }
}
