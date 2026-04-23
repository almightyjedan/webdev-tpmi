<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Industry;
use App\Models\PumpType;
use App\Models\DetailPump;
use App\Models\News;
use App\Models\Project;
use App\Models\Comments;
use App\Models\CategoryPump;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // ==========================================
        // 1. SEEDER PUMP
        // ==========================================
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin Torishima', 'password' => Hash::make('admin')]
        );

        $typeMapping = [
            'End Suction Pumps' => [
                'CAL / CAR', 'CAM', 'CEN', 'CEN-O', 'CEN-SV', 
                'CPCG', 'CPR', 'TDX', 'Fire Pump', 'MPX', 'Marine Capability'
            ],
            'Horizontal Split Case Double Suction Pump' => ['CDM'],
            'Multistage Pump' => ['MHD', 'MMK/L', 'MMO'],
            'Vertical Pump' => ['MMTV', 'SPV'],
        ];

        $industryMapping = [
            'Chemical Industry' => ['CAL / CAR', 'CDM', 'MMK/L'],
            'Construction and Utility Industry' => [
                'CAL / CAR', 'CDM', 'CPCG', 'CPR', 'MHD', 'MMK/L', 'MMO', 'TDX', 'Fire Pump', 'MPX', 'Marine Capability'
            ],
            'Energy Industry' => [
                'CAL / CAR', 'CAM', 'CDM', 'CEN', 'CEN-O', 'CEN-SV', 'CPCG', 'MHD', 'MMK/L', 'MMTV', 'SPV'
            ],
            'General Industry' => [
                'CAL / CAR', 'CAM', 'CDM', 'CEN', 'CEN-O', 'CEN-SV', 'CPCG', 'CPR', 'MHD', 'MMK/L', 'TDX', 'Fire Pump', 'MPX', 'Marine Capability'
            ],
            'Water Works & Environment' => [
                'CAL / CAR', 'CDM', 'CPCG', 'CPR', 'MHD', 'MMK/L', 'MMO', 'SPV', 'TDX', 'Fire Pump', 'MPX', 'Marine Capability'
            ],
        ];

        $industryModels = [];
        foreach ($industryMapping as $name => $assignedCategories) {
            $industryModels[$name] = Industry::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
        foreach ($typeMapping as $typeName => $categories) {
            $type = PumpType::updateOrCreate(
                ['slug' => Str::slug($typeName)],
                ['name' => $typeName]
            );

            foreach ($categories as $catName) {
                $category = CategoryPump::updateOrCreate(
                    ['slug' => Str::slug($catName)],
                    ['name' => $catName]
                );

                for ($i = 1; $i <= 2; $i++) {
                    $modelName = $catName . " " . rand(50, 250) . ($i == 1 ? " Standard" : " High Flow");
                    
                    $product = DetailPump::create([
                        'category_pump_id' => $category->id,
                        'pump_type_id' => $type->id,
                        'model_name' => $modelName,
                        'description' => "Reliable $catName series for industrial applications.",
                    ]);

                    foreach ($industryMapping as $indName => $allowedCats) {
                        if (in_array($catName, $allowedCats)) {
                            $product->industries()->attach($industryModels[$indName]->id);
                        }
                    }
                }
            }
        }

        // ==========================================
        // 2. SEEDER PROJECTS
        // ==========================================
        for ($i = 1; $i <= 10; $i++) {
            $project = \App\Models\Project::create([
                'main_title'  => 'Project Location ' . $faker->city(),
                'title'       => 'Industrial Installation: ' . $faker->sentence(3),
                'description' => $faker->paragraph(4),
                'images'      => [
                    'project-img-1.jpg',
                    'project-img-2.jpg',
                    'project-img-3.jpg'
                ],
                'created_at'  => now()->subDays(rand(1, 100)),
            ]);

            $industries = \App\Models\Industry::inRandomOrder()->take(rand(1, 2))->get();
            $project->industries()->attach($industries->pluck('id'));

            $relatedPumps = \App\Models\DetailPump::whereHas('industries', function($q) use ($industries) {
                $q->whereIn('industries.id', $industries->pluck('id'));
            })->inRandomOrder()->take(rand(2, 4))->pluck('id');

            $project->detailPumps()->attach($relatedPumps);
        }
        // ==========================================
        // 3. SEEDER NEWS & COMMENTS
        // ==========================================
        for ($i = 1; $i <= 10; $i++) {
            $newsTitle = $faker->sentence(6);
            
            $news = \App\Models\News::create([
                'image'       => 'news-dummy-' . $i . '.jpg',
                'title'       => $newsTitle,
                'slug'        => \Illuminate\Support\Str::slug($newsTitle),
                'description' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
                'posted_by'   => $faker->name(),
                'posted_at'   => now()->subDays(rand(1, 30))->format('Y-m-d'),
                'created_at'  => now()->subDays(31),
            ]);

            // Comments
            for ($j = 1; $j <= 10; $j++) {
                \App\Models\Comments::create([
                    'news_id'      => $news->id,
                    'user_name'    => $faker->name(),
                    'comment_text' => $faker->sentence(10),
                    'created_at'   => now()->subDays(rand(1, 20)),
                ]);
            }
        }
    }
}