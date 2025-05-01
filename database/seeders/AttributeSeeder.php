<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\dashboard\Attribute;
use App\Models\dashboard\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Attribute::truncate();
        AttributeValue::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $size_attribute = Attribute::create([
            'name' => 'حجم',
        ]);

        $color_attribute = Attribute::create([
            'name' => 'لون',
        ]);

        $size_attribute->Attributevalues()->createMany([
            ['value' => 'صغير'],
            ['value' => 'متوسط'],
            ['value' => 'كبير'],
        ]);

        $color_attribute->Attributevalues()->createMany([
            ['value' => 'احمر'],
            ['value' => 'اخضر'],
            ['value' => 'ازرق'],
        ]);
    }
}
