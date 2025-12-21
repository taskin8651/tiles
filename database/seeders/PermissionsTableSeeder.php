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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 24,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 25,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 26,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 27,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 28,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 29,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 30,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 31,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 32,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 33,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 34,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 35,
                'title' => 'expense_create',
            ],
            [
                'id'    => 36,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 37,
                'title' => 'expense_show',
            ],
            [
                'id'    => 38,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 39,
                'title' => 'expense_access',
            ],
            [
                'id'    => 40,
                'title' => 'income_create',
            ],
            [
                'id'    => 41,
                'title' => 'income_edit',
            ],
            [
                'id'    => 42,
                'title' => 'income_show',
            ],
            [
                'id'    => 43,
                'title' => 'income_delete',
            ],
            [
                'id'    => 44,
                'title' => 'income_access',
            ],
            [
                'id'    => 45,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 46,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 47,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 48,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 49,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 50,
                'title' => 'add_product_access',
            ],
            [
                'id'    => 51,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 52,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 54,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 56,
                'title' => 'products_tag_create',
            ],
            [
                'id'    => 57,
                'title' => 'products_tag_edit',
            ],
            [
                'id'    => 58,
                'title' => 'products_tag_show',
            ],
            [
                'id'    => 59,
                'title' => 'products_tag_delete',
            ],
            [
                'id'    => 60,
                'title' => 'products_tag_access',
            ],
            [
                'id'    => 61,
                'title' => 'product_create',
            ],
            [
                'id'    => 62,
                'title' => 'product_edit',
            ],
            [
                'id'    => 63,
                'title' => 'product_show',
            ],
            [
                'id'    => 64,
                'title' => 'product_delete',
            ],
            [
                'id'    => 65,
                'title' => 'product_access',
            ],
            [
                'id'    => 66,
                'title' => 'service_create',
            ],
            [
                'id'    => 67,
                'title' => 'service_edit',
            ],
            [
                'id'    => 68,
                'title' => 'service_show',
            ],
            [
                'id'    => 69,
                'title' => 'service_delete',
            ],
            [
                'id'    => 70,
                'title' => 'service_access',
            ],
            [
                'id'    => 71,
                'title' => 'blog_create',
            ],
            [
                'id'    => 72,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 73,
                'title' => 'blog_show',
            ],
            [
                'id'    => 74,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 75,
                'title' => 'blog_access',
            ],
            [
                'id'    => 76,
                'title' => 'website_setup_access',
            ],
            [
                'id'    => 77,
                'title' => 'logo_create',
            ],
            [
                'id'    => 78,
                'title' => 'logo_edit',
            ],
            [
                'id'    => 79,
                'title' => 'logo_show',
            ],
            [
                'id'    => 80,
                'title' => 'logo_delete',
            ],
            [
                'id'    => 81,
                'title' => 'logo_access',
            ],
            [
                'id'    => 82,
                'title' => 'brand_create',
            ],
            [
                'id'    => 83,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 84,
                'title' => 'brand_show',
            ],
            [
                'id'    => 85,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 86,
                'title' => 'brand_access',
            ],
            [
                'id'    => 87,
                'title' => 'team_create',
            ],
            [
                'id'    => 88,
                'title' => 'team_edit',
            ],
            [
                'id'    => 89,
                'title' => 'team_show',
            ],
            [
                'id'    => 90,
                'title' => 'team_delete',
            ],
            [
                'id'    => 91,
                'title' => 'team_access',
            ],
            [
                'id'    => 92,
                'title' => 'testimoni_create',
            ],
            [
                'id'    => 93,
                'title' => 'testimoni_edit',
            ],
            [
                'id'    => 94,
                'title' => 'testimoni_show',
            ],
            [
                'id'    => 95,
                'title' => 'testimoni_delete',
            ],
            [
                'id'    => 96,
                'title' => 'testimoni_access',
            ],
            [
                'id'    => 97,
                'title' => 'enquiry_create',
            ],
            [
                'id'    => 98,
                'title' => 'enquiry_edit',
            ],
            [
                'id'    => 99,
                'title' => 'enquiry_show',
            ],
            [
                'id'    => 100,
                'title' => 'enquiry_delete',
            ],
            [
                'id'    => 101,
                'title' => 'enquiry_access',
            ],
            [
                'id'    => 102,
                'title' => 'contact_detail_create',
            ],
            [
                'id'    => 103,
                'title' => 'contact_detail_edit',
            ],
            [
                'id'    => 104,
                'title' => 'contact_detail_show',
            ],
            [
                'id'    => 105,
                'title' => 'contact_detail_delete',
            ],
            [
                'id'    => 106,
                'title' => 'contact_detail_access',
            ],
            [
                'id'    => 107,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 108,
                'title' => 'add_gallery_create',
            ],
            [
                'id'    => 109,
                'title' => 'add_gallery_edit',
            ],
            [
                'id'    => 110,
                'title' => 'add_gallery_show',
            ],
            [
                'id'    => 111,
                'title' => 'add_gallery_delete',
            ],
            [
                'id'    => 112,
                'title' => 'add_gallery_access',
            ],
            [
                'id'    => 113,
                'title' => 'gallery_category_create',
            ],
            [
                'id'    => 114,
                'title' => 'gallery_category_edit',
            ],
            [
                'id'    => 115,
                'title' => 'gallery_category_show',
            ],
            [
                'id'    => 116,
                'title' => 'gallery_category_delete',
            ],
            [
                'id'    => 117,
                'title' => 'gallery_category_access',
            ],
            [
                'id'    => 118,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
