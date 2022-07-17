<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::insert([
            ['name' => 'Поставщик 1'],
            ['name' => 'Поставщик 2'],
            ['name' => 'Поставщик 3'],
            ['name' => 'Поставщик 4'],
        ]);
    }
}
