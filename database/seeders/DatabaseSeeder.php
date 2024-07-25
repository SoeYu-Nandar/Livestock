<?php

namespace Database\Seeders;

use App\Models\Type;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        Category::create([
            'name' => 'မွေးမြူခြင်း',
            'slug' => 'livestock_knowledge',
        ]);
        Category::create([
            'name' => 'မျိုးပွားခြင်း',
            'slug' => 'reproduction',
        ]);       
        Category::create([
            'name' => 'အစာကျွေးနည်းစနစ်',
            'slug' => 'feeding_system',
        ]);
        Category::create([
            'name' => 'အာဟာရလိုအပ်ချက်များ',
            'slug' => 'animal_nutrition',
        ]);
        Category::create([
            'name' => 'ဖြစ်ပွားတတ်သောရောဂါများ',
            'slug' => 'sesonal-diseases',
        ]);
        Category::create([
            'name' => 'တိရစ္ဆာန်များ၏ကျန်းမာခြင်း၊မကျန်းမာခြင်း လက္ခဏာများ',
            'slug' => 'healthiness_and_unhealthiness_signs',
        ]);

        Type::create([
            'name' => 'ကြက်',
            'slug' => 'chicken',
        ]);
        Type::create([
            'name' => 'ဝက်',
            'slug' => 'pig',
        ]);
        Type::create([
            'name' => 'ဘဲ',
            'slug' => 'duck',
        ]);
        Type::create([
            'name' => 'နွား',
            'slug' => 'cow',
        ]);
        Type::create([
            'name' => 'ငါး',
            'slug' => 'fish',
        ]);
        
    }
}
