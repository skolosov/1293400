<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::insert([
            ['name' => 'рубли'],
            ['name' => 'доллары'],
            ['name' => 'евро'],
        ]);
    }
}
