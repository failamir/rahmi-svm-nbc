<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'dataset_create',
            ],
            [
                'id'    => 18,
                'title' => 'dataset_edit',
            ],
            [
                'id'    => 19,
                'title' => 'dataset_show',
            ],
            [
                'id'    => 20,
                'title' => 'dataset_delete',
            ],
            [
                'id'    => 21,
                'title' => 'dataset_access',
            ],
            [
                'id'    => 22,
                'title' => 'text_preprocessing_create',
            ],
            [
                'id'    => 23,
                'title' => 'text_preprocessing_edit',
            ],
            [
                'id'    => 24,
                'title' => 'text_preprocessing_show',
            ],
            [
                'id'    => 25,
                'title' => 'text_preprocessing_delete',
            ],
            [
                'id'    => 26,
                'title' => 'text_preprocessing_access',
            ],
            [
                'id'    => 27,
                'title' => 'klasifikasi_access',
            ],
            [
                'id'    => 28,
                'title' => 'nbc_create',
            ],
            [
                'id'    => 29,
                'title' => 'nbc_edit',
            ],
            [
                'id'    => 30,
                'title' => 'nbc_show',
            ],
            [
                'id'    => 31,
                'title' => 'nbc_delete',
            ],
            [
                'id'    => 32,
                'title' => 'nbc_access',
            ],
            [
                'id'    => 33,
                'title' => 'svm_create',
            ],
            [
                'id'    => 34,
                'title' => 'svm_edit',
            ],
            [
                'id'    => 35,
                'title' => 'svm_show',
            ],
            [
                'id'    => 36,
                'title' => 'svm_delete',
            ],
            [
                'id'    => 37,
                'title' => 'svm_access',
            ],
            [
                'id'    => 38,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
