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


            'info-view',
            'info-update',
            'job-report-list',
            'job-report-show',
            'job-report-edit',
            'job-report-update',
            'type-feedback-list',
            'type-feedback-create',
            'type-feedback-edit',
            'type-feedback-delete',
            'feedback-list',
            'feedback-show',
            'feedback-delete',

            'support-list',
            'support-show',
            'support-delete',
            'support-choose',
            'feedback-choose',
            'company-list',
            'company-show',


            'user-choose',
            'category-choose',
            'company-choose',
            'top-choose',
            'top-home-choose',
            'featured-choose',
            'post-choose',
            'slug-choose',
            'media-choose',
            'job-posting-choose',

            'public_link-list',
            'public_link-create',
            'public_link-edit',
            'public_link-delete',
            'consultation-list',
            'consultation-create',
            'consultation-edit',
            'consultation-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'type-consultation-list',
            'type-consultation-create',
            'type-consultation-edit',
            'type-consultation-delete',
            'hotline-list',
            'hotline-create',
            'hotline-edit',
            'hotline-delete',
            'type-hotline-list',
            'type-hotline-create',
            'type-hotline-edit',
            'type-hotline-delete',
            'partner-list',
            'partner-create',
            'partner-edit',
            'partner-delete',
            'type-partner-list',
            'type-partner-create',
            'type-partner-edit',
            'type-partner-delete',
            'value-list',
            'value-create',
            'value-edit',
            'value-delete',
            'figure-list',
            'figure-create',
            'figure-edit',
            'figure-delete',
            'recruitment-service-list',
            'recruitment-service-create',
            'recruitment-service-edit',
            'recruitment-service-delete',
            'smart-recruitment-list',
            'smart-recruitment-create',
            'smart-recruitment-edit',
            'smart-recruitment-delete',

            // Quyền cho 'products'
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            // Quyền cho 'type-employer'
            'type-employer-list',
            'type-employer-create',
            'type-employer-edit',
            'type-employer-delete',

            // Quyền cho 'slides'
            'slide-list',
            'slide-create',
            'slide-edit',
            'slide-delete',
            'slide-choose',  // Specific permission for choosing slides

            // Quyền cho 'carts'
            'cart-list',
            'cart-create',
            'cart-edit',
            'cart-delete',

            // Quyền cho 'ordermanages'
            'ordermanage-list',
            'ordermanage-create',
            'ordermanage-edit',
            'ordermanage-delete',

            // Quyền cho 'plan-currencies'
            'plan-currency-list',
            'plan-currency-create',
            'plan-currency-edit',
            'plan-currency-delete',

            // Quyền cho 'plan-features'
            'plan-feature-list',
            'plan-feature-create',
            'plan-feature-edit',
            'plan-feature-delete',
            // Quyền cho 'purchased-manage'
            'purchased-manage',
             'employer-carts-list', // quyền xem tất cả carts
            'employer-carts-delete', // quyền xóa cart
            'about-sent-view', // quyền xem tin nhắn đã gửi
            'about-sent-delete', // quyền xóa tin nhắn đã gửi
            'candidate-sentEmails-view', // quyền xem email đã gửi của ứng viên
            'candidate-sentEmails-delete', // quyền xóa email đã gửi của ứng viên
            'employer-sentEmails-view', // quyền xem email đã gửi của nhà tuyển dụng
            'employer-sentEmails-delete', // quyền xóa email đã gửi của nhà tuyển dụng
            'contact-send-email', // quyền gửi email

             // Quyền cho 'banks'
            'bank-list',
            'bank-create',
            'bank-edit',
            'bank-delete',
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
