<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\NavEle;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::create([
            'username' => 'admin',
            'email' => 'admin@vision-things.com',
            'password' => Hash::make('vision_things'),
            'manage_pages' => 'on', 
            'manage_contracts' => 'on',
            'create_contract' => 'on',
            'manage_promocodes' => 'on',
            'manage_members' => 'on',
            'view_reports' => 'on',
            'view_mail' => 'on',
            'profile_pic' => '',
            
        ]);

        NavEle::create([
            'title_ar' => 'التطوير والأبحاث',
            'title_en' => 'Research & Development',          
        ]);

        NavEle::create([
            'title_ar' => 'حلول الأعمال',
            'title_en' => 'Business Solutions',          
        ]);

        Page::create([
            'nav_ele_id' => '1', 
            'title_ar' => 'الذكاء الاصطناعي', 
            'title_en' => 'Artificial Intelligence AI',
            'slug' => 'artificial-intelligence',
        ]);
        Page::create([
            'nav_ele_id' => '1', 
            'title_ar' => 'الرؤية بالحاسب', 
            'title_en' => 'Computer Vision CR',
            'slug' => 'computer-vision',
        ]);
        Page::create([
            'nav_ele_id' => '1', 
            'title_ar' => 'الروبوتات', 
            'title_en' => 'Robots',
            'slug' => 'robots',
        ]);
        Page::create([
            'nav_ele_id' => '1', 
            'title_ar' => 'الواقع المعزز', 
            'title_en' => 'Augmented Reality AR',
            'slug' => 'augmented-reality',
        ]);
        Page::create([
            'nav_ele_id' => '1', 
            'title_ar' => 'انترنت الأشياء', 
            'title_en' => 'Internet of Things IOT',
            'slug' => 'internet-of-things',
        ]);
        Page::create([
            'nav_ele_id' => '2', 
            'title_ar' => 'عقد صيانة كاميرات المراقبة السنوي', 
            'title_en' => 'CCTV AMC',
            'slug' => 'cctv-amc',
        ]);
        Page::create([
            'nav_ele_id' => '2', 
            'title_ar' => 'إطلاق أنظمة الأعمال', 
            'title_en' => 'Launching Business Systems',
            'slug' => 'launching-business-systems',
        ]);
        Page::create([
            'nav_ele_id' => '2', 
            'title_ar' => 'اطلاق MVB', 
            'title_en' => 'Launching MVB',
            'slug' => 'launching-mvb',
        ]);

    }
}
