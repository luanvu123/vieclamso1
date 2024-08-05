<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           // Quyền cho 'candidates'
            'candidate-list',
            'candidate-create',
            'candidate-edit',
            'candidate-delete',

            // Quyền cho 'categories'
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            // Quyền cho 'awards'
            'award-list',
            'award-create',
            'award-edit',
            'award-delete',

            // Quyền cho 'ecosystems'
            'ecosystem-list',
            'ecosystem-create',
            'ecosystem-edit',
            'ecosystem-delete',

            // Quyền cho 'medias'
            'media-list',
            'media-create',
            'media-edit',
            'media-delete',

            // Quyền cho 'slugs'
            'slug-list',
            'slug-create',
            'slug-edit',
            'slug-delete',

            // Quyền cho 'posts'
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',

            // Quyền cho 'genre-posts'
            'genre-post-list',
            'genre-post-create',
            'genre-post-edit',
            'genre-post-delete',

            // Quyền cho 'courses'
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',

            // Quyền cho 'type_support'
            'type-support-list',
            'type-support-create',
            'type-support-edit',
            'type-support-delete',

            // Quyền cho 'employers'
            'employer-list',
            'employer-create',
            'employer-edit',
            'employer-delete',

            // Quyền cho 'job-postings-manage'
            'job-posting-manage-list',
            'job-posting-manage-create',
            'job-posting-manage-edit',
            'job-posting-manage-delete',
        ];

        foreach ($permissions as $permission) {
             if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
