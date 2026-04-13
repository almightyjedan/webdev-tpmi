<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Industry;
use App\Models\PumpType;
use App\Models\DetailPump;
use App\Models\CategoryPump;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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
    }
}